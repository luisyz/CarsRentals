<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable=['fullname','email','address','zipcode', 'creditcard','pickup_id','return_id', 'pickup_date','return_date', 'category_id', 'cost', 'extras'];
}
