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
    $categories=Category::all();
    return view('admin.createcategory')->withCategories($categories);
  }

  public function storelocation(Request $request)
  {
    Location::create($request->all());
    $location=Location::all();
    return view('admin.createLocation')->withLocation($location);
  }
  public function storereservation(Request $request)
  {
    $id=Reservation::create($request->all());
    return view('cars.confirmation')->withId($id);
  }
  public function deletecategory(Request $id)
  {
    $delCategory=Category::destroy($id->all());
    $categories=Category::all();
    return view('admin.createcategory')->withCategories($categories);
  }
  public function deletereservation(Request $id)
  {
    $delReservation=Reservation::destroy($id->all());
    $categories=Category::all();
    $location=Location::all();
    $reservations=Reservation::all();
    $extras=Extra::all();
    return view('cars.checkreservations')->withCategories($categories)->withLocation($location)->withReservations($reservations)->withExtras($extras);
  }

  public function deletelocation(Request $id)
  {
    $delLocation=Location::destroy($id->all());
    $location=Location::all();
    return view('admin.createLocation')->withLocation($location);
  }
  public function checkreservation(Request $request)
  {
    $categories=Category::all();
    $location=Location::all();
    $reservations=Reservation::all();
    return view('cars.checkreservations')->withCategories($categories)->withLocation($location)->withReservations($reservations);
  }
  public function payment(Request $request){
    \Stripe\Stripe::setApiKey('sk_test_3VJB2l9edZTMCRYGLvX6KuQ900FkWJIxCq');
    $token = $_GET['stripeToken'];
    $cartammount= $_GET['cost'];
    $charge = \Stripe\Charge::create([
    'amount' => $cartammount*90,
    'currency' => 'usd',
    'description' => 'Reservation charge',
    'source' => $token,
]);
 //dd('successful payment');
 $id=Reservation::create($request->all());
 return view('cars.confirmation')->withId($id);
  }
}
