<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  protected $fillable=['country','state','branch','rate', 'is_airport'];
  public function categories()
  {
    return $this->belongsToMany('\App\Category');
  }
}
