<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = [
        'store_id',
        'offer',
        'category',
        'expiry_date',
        'has_logo',
        'logo_path',
        'created_by',
    ];
}
