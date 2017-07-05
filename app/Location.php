<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Store;

class Location extends Model
{
  protected $fillable = [
      'location_name',
      'location_address',
      'created_by',
  ];
}
