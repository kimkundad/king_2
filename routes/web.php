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
  Route::get('brander/{id}', 'HomeController@brander')->name('shop');
  Route::get('sub_shop/{id}', 'HomeController@sub_shop')->name('sub_shop');
  Route::get('album/{id}', 'HomeController@album')->name('album');
  Route::get('product/{id}', 'HomeController@product')->name('product');
  Route::get('new_album/{id}', 'HomeController@new_album')->name('new_album');
  Route::post('add_new_albums', 'HomeController@add_new_albums');
  Route::post('add_num_stock', 'HomeController@add_num_stock');
  Route::get('/my_shop', 'HomeController@my_shop')->name('my_shop');
  Route::get('/my_product', 'HomeController@my_product')->name('my_product');



  Route::get('admin/dashboard', 'DashboardController@index');
  Route::resource('admin/brander', 'BranderController');
  Route::resource('admin/shop', 'ShopController');
  Route::resource('admin/category', 'CategoryController');
  Route::resource('admin/product', 'ProductController');
  Route::post('upload_more_pic', 'ProductController@upload_more_pic');
  Route::get('admin/category/del/{id}', 'CategoryController@del_cat');
  Route::post('property_image_del', 'ProductController@property_image_del');
  Route::post('api/post_status', 'ProductController@post_status');
  Route::post('api/post_status_shop', 'ProductController@post_status_shop');

  Route::resource('admin/albums', 'AlbumController');
  Route::get('admin/new_album/{id}', 'AlbumController@new_album');

  Route::get('admin/new_file/{id}', 'AlbumController@new_file');



  Route::resource('admin/order', 'OrderController');
  Route::get('admin/new_order/{id}', 'OrderController@new_order');

  Route::post('admin/add_file', 'AlbumController@add_file');

  Route::post('property_imageshop_del', 'AlbumController@property_imageshop_del');
  Route::get('admin/fileshops/del/{id}', 'AlbumController@del_file_shop');
  Route::resource('admin/employee', 'EmployeeController');
  Route::get('admin/new_employee/{id}', 'EmployeeController@new_employee');
  Route::get('admin/employee_del/{id}', 'EmployeeController@employee_del');

  Route::get('admin/product_new/{id}', 'ProductController@product_new');
  Route::post('admin/product_add', 'ProductController@product_add');

  Route::resource('admin/stock', 'StockController');

  Route::get('admin/stock_new/{id}', 'StockController@stock_new');
  Route::post('admin/stock_add', 'StockController@stock_add');
  Route::get('admin/stock_edit/{id}', 'StockController@stock_edit');
  Route::post('admin/stock_edit2', 'StockController@stock_edit2');


  });


//Route::get('/home', 'HomeController@index')->name('home');
