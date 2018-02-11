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
Route::auth();

Route::get('/', function () {

  if(Auth::check()){
  return Redirect::to('home');
  }else{
    return view('auth.login');
  }

});

Auth::routes();

Route::get('/redirect', 'FacebookAuthController@redirect');
Route::get('/callback', 'FacebookAuthController@callback');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function () {

  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/shop', 'HomeController@shop')->name('shop');
  Route::get('/sub_shop', 'HomeController@sub_shop')->name('sub_shop');
  Route::get('/album', 'HomeController@album')->name('album');


  });

//Route::get('/home', 'HomeController@index')->name('home');
