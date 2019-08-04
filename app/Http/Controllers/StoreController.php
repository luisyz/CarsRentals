<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Category;
use App\Location;
use App\Reservation;
use App\Extra;
use Validator;
use App\Http\Requests\ListAvailableCategoriesRequest;

class StoreController extends Controller
{
  public function storecategory(Request $request)
  {
    Category::create($request->all());
    return route('admin_createcategory');
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
  public function checkreservation(Request $request)
  {
    Reservation::get('$reservation_id');
    $categories=Category::all();
    $location=Location::all();
    $reservations=Reservation::all();
    return view('cars.checkreservations')->withCategories($categories)->withLocation($location)->withReservations($reservations);
  }
}
