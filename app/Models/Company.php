<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends BaseModel
{
    protected $table = 'company';
    protected $fillable = [
        'name',
        'trading_name',
        'depth',
        'representative_name',
        'email',
        'address',
        'phone',
        'hotline',
    ];
}
