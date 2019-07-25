<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
  public function storecategory(Request $request)
  {
    Category::create($request->all());
    return route('cars_seedates');
  }

  public function storelocation(Request $request)
  {
    Location::create($request->all());
    return route('cars_seedates');
  }
  public function storereservation(Request $request)
  {
    Reservation::create($request->all());
    return route('homepage');
  }
}
