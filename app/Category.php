<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
  public function cars()
  {
    return $this->hasMany('\App\Car');
  }
}
