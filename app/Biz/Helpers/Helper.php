<?php

namespace App\Biz\Helpers;

use DateTime;
use League\Fractal\TransformerAbstract;

class Helper
{
    public static function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }

    /**
     * Summary of formatDateTime
     * @param mixed $date
     * @param mixed $oldFormat
     * @param mixed $newFormat
     * @return DateTime|bool|string
     */
    public function formatDateTime($date, $oldFormat = 'Y-m-d H:i:s', $newFormat = null)
    {
        $date = DateTime::createFromFormat($oldFormat, $date);
        if($newFormat){
            return $date->format($newFormat);
        }
        return $date;
    }

    /**
     * Summary of unsetKeyNull
     * @param array $data
     * @param mixed $skipKey
     * @return array
     */
    public static function unsetKeyNull(Array $data, $skipKey = []){
        foreach($data as $key => $value){
            if($value === null){
                if(array_search($key, $skipKey) === false){
                    continue;
                }
                unset($data[$key]);
            }
        }
        return $data;
    }

    public static function transformData($data, TransformerAbstract $transformer)
    {
        $transformedData = fractal($data, $transformer);
        return $transformedData->toArray();
    }
}
