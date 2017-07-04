<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = [
        'company_name',
        'offer',
        'category',
        'expiry_date',
        'has_logo',
        'logo_path',
    ];
}
