<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Category;
use App\Location;

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
    public function categories(Request $request)
    {
      // if (isset(pickup_date))
  //    if (NULL !==(pickup_date))
      // {
        $pickup_location=$_GET['pickup_location'];
        $pickup_date=$_GET['pickup_date'];
        $return_location=$_GET['return_location'];
        $return_date=$_GET['return_date'];

        if (empty($_GET['pickup_date']) || empty($_GET['pickup_location']) || empty($_GET['return_date']) || empty($_GET['return_location']))
        {
      $categories=Category::all();
      $location=Location::all();
      return view('cars.categories')->withCategories($categories)->withLocation($location);
    }
    else{
      $location=Location::all();
      return view('cars.seedates')->withLocation($location);
    }
    // }
    // else{
    //   confirm('No llenaste todos los datos');
    //   return view('cars.seedates');
    // }
    }

    public function create(Request $request)
    {
      $categories=Category::all();
      return view('cars.create')->withCategories($categories);
    }
    public function store(Request $request)
    {
      // Car::create([
      //   "brand"=>$_POST['brand'],
      //   "model"=>$_POST['model'],
      //   "year"=>$_POST['year'],
      //   "category_id"=>$_POST['category_id'],
      // ]);
      // return route('cars_index');
      Car::create($request->all());
      return route('cars_index');
    }
    public function createlocation(Request $request)
    {
      return view('cars.createlocation');
    }
    public function storelocation(Request $request)
    {
      Car::create($request->all());
      return route('cars_index');
    }
    public function show()
    {

    }
    public function delete()
    {

    }
}
