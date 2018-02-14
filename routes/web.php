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

  Route::get('download/{filename}', function ($filename='')
  {
      $file = asset('admin/assets/shop_file/') . '/' . $filename; // or wherever you have stored your PDF files
      return response()->download($file);
  });


  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/shop', 'HomeController@shop')->name('shop');
  Route::get('/sub_shop', 'HomeController@sub_shop')->name('sub_shop');
  Route::get('/album', 'HomeController@album')->name('album');
  Route::get('/new_album', 'HomeController@new_album')->name('new_album');
  Route::get('admin/dashboard', 'DashboardController@index');
  Route::resource('admin/brander', 'BranderController');
  Route::resource('admin/shop', 'ShopController');
  Route::resource('admin/category', 'CategoryController');
  Route::resource('admin/product', 'ProductController');
  Route::post('upload_more_pic', 'ProductController@upload_more_pic');
  Route::get('admin/category/del/{id}', 'CategoryController@del_cat');
  Route::post('property_image_del', 'ProductController@property_image_del');
  Route::post('api/post_status', 'ProductController@post_status');

  Route::resource('admin/albums', 'AlbumController');
  Route::get('admin/new_album/{id}', 'AlbumController@new_album');

  Route::get('admin/new_file/{id}', 'AlbumController@new_file');

  Route::post('admin/add_file', 'AlbumController@add_file');

  Route::post('property_imageshop_del', 'AlbumController@property_imageshop_del');
  Route::get('admin/fileshops/del/{id}', 'AlbumController@del_file_shop');
  Route::resource('admin/employee', 'EmployeeController');
  Route::get('admin/new_employee/{id}', 'EmployeeController@new_employee');
  Route::get('admin/employee_del/{id}', 'EmployeeController@employee_del');




  });


//Route::get('/home', 'HomeController@index')->name('home');
