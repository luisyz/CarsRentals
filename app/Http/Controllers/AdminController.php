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

class AdminController extends Controller
{
  public function adminlog()
  {
    return view('admin.login');
  }
  public function adminnav()
  {
  //  Admin::create($request->all());
    return view('admin.adminnav');
  }
  public function createlocation(Request $request)
  {
    $location=Location::all();
    return view('admin.createlocation')->withLocation($location);
  }
  public function createcategory(Request $request)
  {
    $categories=Category::all();
    return view('admin.createcategory')->withCategories($categories);
  }
  public function viewreservation(Request $request)
  {
    $categories=Category::all();
    $location=Location::all();
    $reservations=Reservation::all();
    $extras=Extra::all();
    return view('admin.viewreservation')->withCategories($categories)->withLocation($location)->withReservations($reservations)->withExtras($extras);
  }
}
