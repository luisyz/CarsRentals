<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;

class Category extends Model
{
  protected $fillable=['name','capacity','cost'];

  public function cars()
  {
    return $this->hasMany('\App\Car');
  }
  public function locations()
  {
    return $this->belongsToMany(Location::class);
  }
}
