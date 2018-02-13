<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\province;
use App\shop;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $shop = DB::table('shops')->select(
          'shops.*',
          'shops.id as ids',
          'branders.*'
          )
          ->leftjoin('branders', 'branders.id', '=', 'shops.branders_id')
          ->where('shops.user_id', Auth::user()->id)
          ->orderBy('shops.id', 'desc')
          ->paginate(10);

    $data['objs'] = $shop;

    $data['objs'] = $shop;
    $data['header'] = "Shop";
    return view('admin.shop.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $brander = DB::table('branders')->select(
          'branders.*'
          )
          ->where('user_id', Auth::user()->id)
          ->orderBy('id', 'desc')
          ->get();

    $data['brander'] = $brander;


      $province = province::All();
    $data['province'] = $province;
    $data['header'] = 'New Shop';
    $data['method'] = 'post';
    $data['url'] = url('admin/shop');
    return view('admin.shop.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
       'image' => 'required|mimes:jpg,jpeg,png,gif|max:8048',
       'shop_name' => 'required',
       'branders_id' => 'required',
       'shop_email' => 'required',
       'address' => 'required',
       'shop_phone' => 'required',
       'provience_id' => 'required',
       'lat' => 'required',
       'lng' => 'required',
       'shop_sale' => 'required',
       'shop_code' => 'required',
       'channel' => 'required',
       'shop_area' => 'required'
      ]);

      $image = $request->file('image');

         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
         $img = Image::make($image->getRealPath());
          $img->resize(500, 500, function ($constraint) {
          $constraint->aspectRatio();
        })->save('admin/assets/blog/'.$input['imagename']);

        $package = new shop;
         $package->user_id = Auth::user()->id;
         $package->shop_name = $request['shop_name'];
         $package->branders_id = $request['branders_id'];
         $package->shop_email = $request['shop_email'];
         $package->shop_address = $request['address'];
         $package->shop_phone = $request['shop_phone'];
         $package->provience_id = $request['provience_id'];
         $package->lat = $request['lat'];
         $package->lng = $request['lng'];
         $package->shop_sale = $request['shop_sale'];
         $package->shop_code = $request['shop_code'];
         $package->channel = $request['channel'];
         $package->shop_area = $request['shop_area'];
         $package->detail_shop = $request['detail_shop'];
         $package->image_shop = $input['imagename'];
         $package->save();

     $the_id = $package->id;

     return redirect(url('admin/shop/'.$the_id))->with('success_shop','เพิ่มร้านค้าสำเร็จแล้วค่ะ');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $shop = DB::table('shops')->select(
          'shops.*',
          'shops.id as p_id',
          'province.*',
          'branders.*'
          )
          ->leftjoin('province', 'province.PROVINCE_ID', '=', 'shops.provience_id')
          ->leftjoin('branders', 'branders.id', '=', 'shops.branders_id')
          ->where('shops.user_id', Auth::user()->id)
          ->where('shops.id', $id)
          ->first();


          $product = DB::table('products')->select(
                'products.*',
                'products.id as ids',
                'categories.*'
                )
                ->leftjoin('categories','categories.id', 'products.cat_id')
                ->where('products.shop_id', $id)
                ->where('products.user_id', Auth::user()->id)
                ->orderBy('products.id', 'desc')
                ->paginate(15);


                $total = DB::table('products')->select(
                      'products.*',
                      'categories.*'
                      )
                      ->leftjoin('categories','categories.id', 'products.cat_id')
                      ->where('products.shop_id', $id)
                      ->where('products.user_id', Auth::user()->id)
                      ->orderBy('products.id', 'desc')
                      ->sum('products.product_sum');

                      $count_pro = DB::table('products')->select(
                            'products.*',
                            'categories.*'
                            )
                            ->leftjoin('categories','categories.id', 'products.cat_id')
                            ->where('products.shop_id', $id)
                            ->where('products.user_id', Auth::user()->id)
                            ->orderBy('products.id', 'desc')
                            ->count();







    $data['count_pro'] = $count_pro;
    $data['total_product'] = $total;


    $data['product'] = $product;
    $data['header'] = $shop->shop_name;
    $data['objs'] = $shop;
    $data['url'] = url('admin/shop/'.$id);
    return view('admin.shop.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $shop = DB::table('shops')->select(
          'shops.*',
          'shops.id as p_id',
          'province.*',
          'branders.*'
          )
          ->leftjoin('province', 'province.PROVINCE_ID', '=', 'shops.provience_id')
          ->leftjoin('branders', 'branders.id', '=', 'shops.branders_id')
          ->where('shops.user_id', Auth::user()->id)
          ->where('shops.id', $id)
          ->first();

          $province = province::All();
          $data['province'] = $province;

    $data['objs'] = $shop;
    $data['header'] = 'แก้ไข '.$shop->shop_name;
    $data['url'] = url('admin/shop/'.$id);
    $data['method'] = "put";
    return view('admin.shop.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('image');

        if($image == NULL){

          $this->validate($request, [
           'branders_id' => 'required',
           'shop_email' => 'required',
           'shop_name' => 'required',
           'address' => 'required',
           'shop_phone' => 'required',
           'provience_id' => 'required',
           'lat' => 'required',
           'lng' => 'required',
           'shop_sale' => 'required',
           'shop_code' => 'required',
           'channel' => 'required',
           'shop_area' => 'required'
          ]);

          $package = shop::find($id);
          $package->user_id = Auth::user()->id;
          $package->shop_name = $request['shop_name'];
          $package->shop_address = $request['address'];
          $package->shop_phone = $request['shop_phone'];
          $package->provience_id = $request['provience_id'];
          $package->lat = $request['lat'];
          $package->lng = $request['lng'];
          $package->shop_sale = $request['shop_sale'];
          $package->shop_code = $request['shop_code'];
          $package->channel = $request['channel'];
          $package->shop_area = $request['shop_area'];
          $package->detail_shop = $request['detail_shop'];
          $package->save();

         return redirect(url('admin/shop/'.$id.'/edit'))->with('edit_success','คุณทำการแก้ไขอสังหา สำเร็จ');

        }else{

          $this->validate($request, [
           'image' => 'required|mimes:jpg,jpeg,png,gif|max:8048',
           'shop_name' => 'required',
           'branders_id' => 'required',
           'shop_email' => 'required',
           'address' => 'required',
           'shop_phone' => 'required',
           'provience_id' => 'required',
           'lat' => 'required',
           'lng' => 'required',
           'shop_sale' => 'required',
           'shop_code' => 'required',
           'channel' => 'required',
           'shop_area' => 'required'
          ]);


          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
           $img = Image::make($image->getRealPath());
           $img->resize(500, 500, function ($constraint) {
           $constraint->aspectRatio();
         })->save('admin/assets/blog/'.$input['imagename']);


         $package = shop::find($id);
         $package->user_id = Auth::user()->id;
         $package->shop_name = $request['shop_name'];
         $package->shop_address = $request['address'];
         $package->shop_phone = $request['shop_phone'];
         $package->provience_id = $request['provience_id'];
         $package->lat = $request['lat'];
         $package->lng = $request['lng'];
         $package->shop_sale = $request['shop_sale'];
         $package->shop_code = $request['shop_code'];
         $package->channel = $request['channel'];
         $package->shop_area = $request['shop_area'];
         $package->detail_shop = $request['detail_shop'];
         $package->image_shop = $input['imagename'];
         $package->save();

         return redirect(url('admin/shop/'.$id.'/edit'))->with('edit_success','คุณทำการแก้ไขอสังหา สำเร็จ');


        }
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
