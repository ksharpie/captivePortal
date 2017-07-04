<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  protected $fillable = [
      'company_name',
      'service_description',
      'telephone_number',
      'website',
      'has_logo',
      'logo_path',
  ];
}
