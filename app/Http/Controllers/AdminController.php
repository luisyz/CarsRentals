<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Category;
use App\Location;
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
  public function browse()
  {
    Admin::create($request->all());
    return view('cars.index');
  }
  public function location()
  {
    Admin::create($request->all());
    return view('cars.index');
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
  public function reservation()
  {
    Admin::create($request->all());
    return view('cars.index');
  }
  public function car()
  {
    Admin::create($request->all());
    return view('cars.index');
  }
  public function category()
  {
    Admin::create($request->all());
    return view('cars.index');
  }
}
