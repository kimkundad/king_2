<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
      $data['header'] = "Dashboard";

      $count_pro = DB::table('products')->select(
          'products.*'
          )
          ->where('user_id', Auth::user()->id)
          ->sum('product_sum');


          $count_shop = DB::table('shops')->select(
              'shops.*'
              )
              ->where('user_id', Auth::user()->id)
              ->count();


              $count_stock = DB::table('stocks')->select(
                  'stocks.*'
                  )
                  ->where('user_id', Auth::user()->id)
                  ->count();


                  $count_cat = DB::table('categories')->select(
                      'categories.*'
                      )
                      ->where('user_id', Auth::user()->id)
                      ->count();

      $data['count_cat'] = $count_cat;
      $data['count_stock'] = $count_stock;
      $data['count_pro'] = $count_pro;
      $data['count_shop'] = $count_shop;


      return view('admin.dashboard', $data);
    }
}
