<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable=['fullname','email','creditcard','pickup_id','return_id', 'pickup_date','return_date', 'category_id', 'extra1', 'extra2', 'extra3','cost', 'toPay',];
}
