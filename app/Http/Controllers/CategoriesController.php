<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;

class CategoriesController extends Controller
{
    //
    public function index()
    {
      // echo "konda";
      // phpinfo();
    //  return view('vistaejemplo');
      $categories=\App\Category::all();
      return view('categories.index')->withCategories($categories);
    }

}
