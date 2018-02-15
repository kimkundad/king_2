<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $brander = DB::table('branders')->select(
          'branders.*'
          )
          ->orderBy('id', 'desc')
          ->get();


        $data['objs'] = $brander;
        $data['template'] = 1;
        return view('home', $data);
    }
    public function brander($id)
    {
      $shop = DB::table('shops')->select(
          'shops.*'
          )
          ->where('shops.branders_id', $id)
          ->orderBy('shops.id', 'desc')
          ->get();

    $data['shop'] = $shop;


    $brander = DB::table('branders')->select(
          'branders.*'
          )
          ->where('id', $id)
          ->first();

      $data['brander'] = $brander;



      $data['template'] = 2;
      return view('shop', $data);
    }






    public function sub_shop($id)
    {


      $shop = DB::table('shops')->select(
          'shops.*',
          'shops.id as p_id',
          'province.*',
          'branders.*'
          )
          ->leftjoin('province', 'province.PROVINCE_ID', '=', 'shops.provience_id')
          ->leftjoin('branders', 'branders.id', '=', 'shops.branders_id')
          ->where('shops.id', $id)
          ->first();

      $data['objs'] = $shop;

      $employee = DB::table('employees')->select(
            'employees.*'
            )
            ->where('shop_id', $id)
            ->orderBy('id', 'asc')
            ->paginate(15);
      $data['employee'] = $employee;

      $albums = DB::table('albums')->select(
        'albums.*'
      )
      ->where('shop_id', $id)
      ->orderBy('id', 'desc')
      ->get();

      foreach ($albums as $album) {

        $options = DB::table('album_photos')->select('album_photos.image')->where('album_id',$album->id)->first();
        $album->sum_album = $options;
      }
      //dd($albums);

      $product = DB::table('products')->select(
            'products.*',
            'products.id as ids',
            'categories.*'
            )
            ->leftjoin('categories','categories.id', 'products.cat_id')
            ->where('products.shop_id', $id)
            ->orderBy('products.id', 'desc')
            ->get();


      $total = DB::table('products')->select(
            'products.*',
            'categories.*'
            )
            ->leftjoin('categories','categories.id', 'products.cat_id')
            ->where('products.shop_id', $id)
            ->orderBy('products.id', 'desc')
            ->sum('products.product_sum');

      $data['product'] = $product;
      $data['albums'] = $albums;
      $data['total_product'] = $total;
      $data['template'] = 2;
      return view('sub_shop', $data);
    }






    public function album($id)
    {
      $shop_id = DB::table('albums')->select(
            'albums.*'
            )
            ->where('id', $id)
            ->first();
      $data['shop_id'] = $shop_id;
      $img_all = DB::table('album_photos')->select(
          'album_photos.*'
          )
          ->where('album_id', $id)
          ->get();
      $data['shop_ids'] = $shop_id->shop_id;
      $data['img_all'] = $img_all;
      $data['template'] = 2;
      return view('album', $data);
    }

    public function new_album()
    {
      $data['template'] = 2;
      return view('new_album', $data);
    }
}
