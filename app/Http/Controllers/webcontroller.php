<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webcontroller extends Controller
{
    //
    public function index()
    {
    //  echo "holahola";
  //    return view('vistaejemplo');
  echo \App\Category::all();

    }
}
