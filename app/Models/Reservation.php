<?php

namespace App\Models;


class Reservation extends BaseModel
{
    protected $table = 'reservations';
    protected $fillable = [
        'project_id',
        'company_id',
        'from_date',
        'to_date',
        'long_order',
        'day_in_week',
        'content',
    ];
}
