<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;

class Store extends Model
{
  protected $fillable = [
      'company_name',
      'service_description',
      'telephone_number',
      'website',
      'has_logo',
      'logo_path',
      'created_by',
      'location_id',
  ];
}
