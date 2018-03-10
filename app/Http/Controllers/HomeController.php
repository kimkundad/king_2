<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\album;
use App\album_photo;
use App\fileshop;
use App\stock;
use App\product;
use File;
use Auth;
use Jenssegers\Agent\Agent;
$agent = new Agent();

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


    public function new_album($id){

      $data['method'] = 'post';
      $data['url'] = url('add_new_albums');

      $data['shop_id'] = $id;
      $data['template'] = 2;
      return view('new_album', $data);

    }

    public function add_num_stock(Request $request){

      $this->validate($request, [
           'number_stock' => 'required',
           'product_id' => 'required'
       ]);


       $product = DB::table('products')->select(
             'products.*'
             )
             ->where('id', $request['product_id'])
             ->first();

     if($product->product_sum >= $request['number_stock']){

       $package = new stock;
       $package->user_id = Auth::user()->id;
       $package->product_id = $request['product_id'];
       $package->product_total = $request['number_stock'];
       $package->detail = $request['product_detail'];
       $package->save();

       $id = $request['product_id'];

       $sum = $product->product_sum - $request['number_stock'];
       $package = product::find($id);
       $package->product_sum = $sum;
       $package->save();
       return redirect(url('product/'.$id))->with('success_stock','เพิ่มร้านค้าสำเร็จแล้วค่ะ');

     }else{

       return redirect(url('product/'.$request['product_id']))->with('error_stock','เพิ่มร้านค้าสำเร็จแล้วค่ะ');

     }



    }

    public function add_new_albums(Request $request){

      $this->validate($request, [
           'product_image' => 'required',
           'album_name' => 'required',
           'shop_id' => 'required'
       ]);
       $shop_id = $request['shop_id'];
       $gallary = $request->file('product_image');


       $package = new album;
       $package->user_id = Auth::user()->id;
       $package->shop_id = $request['shop_id'];
       $package->name = $request['album_name'];
       $package->save();

       $the_id = $package->id;




       if (sizeof($gallary) > 1) {

        for ($i = 0; $i < sizeof($gallary); $i++) {

          $path = 'admin/assets/gallery_shop/';
          $filename = time()."-".$gallary[$i]->getClientOriginalName();
          $gallary[$i]->move($path, $filename);


          $admins[] = [
              'album_id' => $the_id,
              'image' => $filename,
          ];


        }
        album_photo::insert($admins);
      }
      return redirect(url('album/'.$the_id))->with('add_album_photo_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }


    public function product($id){


      $product = DB::table('products')->select(
          'products.*',
          'products.id as idp',
          'products.created_at as created',
          'categories.*',
          'shops.*',
          'shops.id as ids'
          )
          ->leftjoin('categories','categories.id', 'products.cat_id')
          ->leftjoin('shops','shops.id', 'products.shop_id')
          ->where('products.id', $id)
          ->where('products.user_id', Auth::user()->id)
          ->orderBy('products.id', 'desc')
          ->first();




          $img_all = DB::table('product_images')->select(
              'product_images.*'
              )
              ->where('product_id', $id)
              ->get();
          $data['img_all'] = $img_all;

          $shop = DB::table('stocks')->select(
            'stocks.*',
            'stocks.id as st_id',
            'stocks.created_at as created_stock',
            'products.*',
            'users.*'
            )
            ->leftjoin('products','products.id', 'stocks.product_id')
            ->leftjoin('users','users.id', 'stocks.user_id')
            ->where('products.id', $id)
            ->orderBy('stocks.id', 'desc')
            ->paginate(15);


          $data['objs'] = $shop;



          $data['product'] = $product;
          $data['header'] = $product->product_name;
          $data['template'] = 2;
          return view('product',$data);

    }



    public function sub_shop($id)
    {


      $shop = DB::table('shops')->select(
          'shops.*',
          'shops.id as p_id',
          'province.*',
          'branders.*',
          'branders.id as bid'
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

      if ($agent->isMobile()) {
        return view('sub_shop_mobile', $data);
      }else{
        return view('sub_shop', $data);
      }

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


}
