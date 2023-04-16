<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyUser extends BaseModel
{
    protected $table = 'company_user';
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
