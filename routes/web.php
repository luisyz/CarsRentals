<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function ()
{
  // echo "hola";
    return view('welcome');
    // echo "konda";
});

Route::get('/a', 'webcontroller@index');

Route::get('/categories', 'CategoriesController@index');

Route::get('/cars/create', ['uses'=>'CarsController@create','as'=>'cars_create']);

Route::get('/cars/createlocation', ['uses'=>'CarsController@createlocation','as'=>'cars_createlocation']);

Route::post('/cars', ['uses'=>'CarsController@store','as'=>'cars_store']);

Route::post('/cars', ['uses'=>'CarsController@storelocation','as'=>'location_store']);

Route::get('/cars/index', ['uses'=>'CarsController@index','as'=>'cars_index']);

Route::get('/cars/reservations/seedates', ['uses'=>'CarsController@seedates','as'=>'cars_seedates']);

Route::get('/cars/reservations/categories', ['uses'=>'CarsController@categories','as'=>'cars_categories']);

Route::get('/cars/prueba',function(){dd(\App\Location::find(1)->branch);
});
