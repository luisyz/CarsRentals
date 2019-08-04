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

class CarsController extends Controller
{
    public function index()
    {
      return view('cars.index');
    }

    public function seedates(Request $request)
    {
      $location=Location::all();
      return view('cars.seedates')->withLocation($location);
    }
    public function categories(ListAvailableCategoriesRequest $request)
    {
      $categories=Category::all();
      $location=Location::all();
      return view('cars.categories')->withCategories($categories)->withLocation($location);
    }

    public function checkreservations(Request $request)
    {
      $categories=Category::all();
      $location=Location::all();
      $reservations=Reservation::all();
      $extras=Extra::all();
      return view('cars.checkreservations')->withCategories($categories)->withLocation($location)->withReservations($reservations)->withExtras($extras);
    }

    public function pinfo(Request $request)
    {
      $categories=Category::all();
      $location=Location::all();
      $extras=Extra::all();
      return view('cars.personalinfo')->withCategories($categories)->withLocation($location)->withExtras($extras);

    }
    public function viewreservations(Request $request){
      $categories=Category::all();
      $location=Location::all();
      $extras=Extra::all();
      $reservation=Reservation::all();
      return view('cars.viewreservations')->withCategories($categories)->withLocation($location)->withExtras($extras)->withReservation($reservation);
    }
    public function payment(Request $request){
      $categories=Category::all();
      $location=Location::all();
      $extras=Extra::all();
      $reservation=Reservation::all();
      return view('cars.payment')->withCategories($categories)->withLocation($location)->withExtras($extras)->withReservation($reservation);
    }
}
