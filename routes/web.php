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

Route::get('/homepage', ['uses'=>'HomepageController@welcome', 'as'=>'homepage']);

Route::get('/admin', ['uses'=>'AdminController@adminlog','as'=>'admin_log']);

Route::get('/admin/nav', ['uses'=>'AdminController@adminnav','as'=>'admin_nav']);

Route::get('/categories', 'CategoriesController@index');

Route::get('/admin/createcategory', ['uses'=>'AdminController@createcategory','as'=>'admin_createcategory']);

Route::get('/admin/createlocation', ['uses'=>'AdminController@createlocation','as'=>'admin_createlocation']);

Route::get('/admin/viewreservation', ['uses'=>'AdminController@viewreservation','as'=>'admin_viewreservation']);

Route::post('/store/createcategory', ['uses'=>'StoreController@storecategory','as'=>'category_store']);

Route::post('/store/createlocation', ['uses'=>'StoreController@storelocation','as'=>'location_store']);

Route::get('/store/payment', ['uses'=>'StoreController@payment','as'=>'payment']);

Route::get('/store/paymentres', ['uses'=>'StoreController@paymentres','as'=>'paymentres']);

Route::get('/store/deletecategory', ['uses'=>'StoreController@deletecategory','as'=>'category_delete']);

Route::get('/store/deletelocation', ['uses'=>'StoreController@deletelocation','as'=>'location_delete']);

Route::get('/store/deletereservation', ['uses'=>'StoreController@deletereservation','as'=>'reservation_delete']);

Route::get('/store/createreseservation', ['uses'=>'StoreController@storereservation','as'=>'reservation_store']);

Route::get('/store/checkreseservation', ['uses'=>'StoreController@checkreservation','as'=>'reservation_check']);

Route::get('/cars/index', ['uses'=>'CarsController@index','as'=>'cars_index']);

Route::get('/cars/reservations/seedates', ['uses'=>'CarsController@seedates','as'=>'cars_seedates']);

Route::get('/cars/reservations/categories', ['uses'=>'CarsController@categories','as'=>'cars_categories']);

Route::get('/cars/reservations/checkreservations', ['uses'=>'CarsController@checkreservations','as'=>'cars_checkreservations']);

Route::get('/cars/reservations/viewreservations', ['uses'=>'CarsController@viewreservations','as'=>'cars_viewreservations']);

Route::get('/cars/reservations/reservationtable', ['uses'=>'CarsController@reservationtable','as'=>'cars_reservationtable']);

Route::post('/cars/reservations/payment', ['uses'=>'CarsController@payment','as'=>'cars_payment']);

Route::get('/cars/reservations/confirmation', ['uses'=>'CarsController@confirmation','as'=>'cars_confirmation']);


Route::get('/cars/reservations/pinfo', ['uses'=>'CarsController@pinfo','as'=>'cars_pinfo']);


Route::get('/cars/prueba',function(){dd(\App\Location::find(1)->branch);
});
