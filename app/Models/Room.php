<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends BaseModel
{
    protected $table = 'reservation_assets';
    protected $fillable = [
        'company_id',
        'reservation_id',
        'room_id',
        'in_date',
        'start_time',
        'end_time',
        'status',
        'note',
    ];
}
