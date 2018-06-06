<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\product;
use App\shop;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use \Milon\Barcode\DNS1D;
use App\product_image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = DB::table('products')->select(
            'products.*',
            'products.id as ids',
            'categories.*'
            )
            ->leftjoin('categories','categories.id', 'products.cat_id')
            ->where('products.user_id', Auth::user()->id)
            ->orderBy('products.id', 'desc')
            ->paginate(15);

        $data['objs'] = $shop;
        $data['header'] = "สินค้าทั้งหมด";
        return view('admin.product.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $shop = DB::table('categories')->select(
          'categories.*'
          )
          ->where('user_id', Auth::user()->id)
          ->orderBy('id', 'asc')
          ->get();

        $data['objs'] = $shop;

        $brander = DB::table('branders')->select(
            'branders.*'
            )
            ->where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();

      $data['brander'] = $brander;

        $shop_id = DB::table('shops')->select(
              'shops.*'
              )
              ->where('user_id', Auth::user()->id)
              ->orderBy('id', 'desc')
              ->get();

        $data['shop_id'] = $shop_id;


        $data['method'] = "post";
        $data['url'] = url('admin/product');
        $data['header'] = "สร้างสินค้า ของคุณใหม่";
        return view('admin.product.create', $data);
    }

    public function product_new($id){

      $shop = DB::table('categories')->select(
          'categories.*'
          )
          ->where('user_id', Auth::user()->id)
          ->orderBy('id', 'asc')
          ->get();

        $data['objs'] = $shop;



        $shop_id = DB::table('shops')->select(
              'shops.*'
              )
              ->where('user_id', Auth::user()->id)
              ->where('id', $id)
              ->first();

        $id_s = $shop_id->id;

        $data['shop_id'] = $shop_id;
        $data['id_s'] = $id_s;


        $data['method'] = "post";
        $data['url'] = url('admin/product');
        $data['header'] = "สร้างสินค้า ของคุณใหม่";
        return view('admin.product.create2', $data);

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
         'product_name' => 'required',
         'product_code' => 'required',
         'product_cat' => 'required',
         'product_sum' => 'required',
         'product_detail' => 'required',
         'shop_name' => 'required'
        ]);

          $image = $request->file('image');

          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
           $img = Image::make($image->getRealPath());
           $img->resize(500, 500, function ($constraint) {
           $constraint->aspectRatio();
         })->save('admin/assets/product/'.$input['imagename']);


         $package = new product;
         $package->user_id = Auth::user()->id;
         $package->cat_id = $request['product_cat'];
         $package->product_name = $request['product_name'];
         $package->product_detail = $request['product_detail'];
         $package->product_code = $request['product_code'];
         $package->product_sum = $request['product_sum'];
         $package->product_image = $input['imagename'];
         $package->product_status = 0;
         $package->shop_id = $request['shop_name'];
         $package->save();

         $the_id = $package->id;

      return redirect(url('admin/product/'.$the_id.'/edit'))->with('success_product','เพิ่มร้านค้าสำเร็จแล้วค่ะ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')->select(
            'products.*',
            'products.id as idp',
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
              'shops.*',
              'users.*'
              )
              ->leftjoin('shops','shops.id', 'stocks.shop_id')
              ->leftjoin('products','products.id', 'stocks.product_id')
              ->leftjoin('users','users.id', 'stocks.user_id')
              ->where('products.id', $id)
              ->orderBy('stocks.id', 'desc')
              ->paginate(15);


        $data['objs'] = $shop;


            $data['product'] = $product;
            $data['header'] = $product->product_name;

            return view('admin.product.show',$data);
    }


    public function post_status(Request $request){

      $user = product::findOrFail($request->product_id);

              if($user->product_status == 1){
                  $user->product_status = 0;
              } else {
                  $user->product_status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);


    }



    public function post_status_shop(Request $request){

      $user = shop::findOrFail($request->product_id);

              if($user->shop_status == 1){
                  $user->shop_status = 0;
              } else {
                  $user->shop_status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);


    }







    public function upload_more_pic(Request $request){

      $this->validate($request, [
           'product_image' => 'required',
           'pro_id' => 'required'
       ]);
       $pro_id = $request['pro_id'];
       $gallary = $request->file('product_image');


       if (sizeof($gallary) > 1) {

        for ($i = 0; $i < sizeof($gallary); $i++) {

          $path = 'admin/assets/gallery_product/';
          $filename = time()."-".$gallary[$i]->getClientOriginalName();
          $gallary[$i]->move($path, $filename);


          $admins[] = [
              'product_id' => $pro_id,
              'image' => $filename,
              'user_id' => Auth::user()->id,
          ];


        }
        product_image::insert($admins);
      }
      return redirect(url('admin/product/'.$pro_id.'/edit'))->with('add_gallery_success','คุณทำการเพิ่มอสังหา สำเร็จ');


    }



    public function property_image_del(Request $request){
    $property_id = $request['pro_id'];

    $gallary = $request->get('product_image');

    if (sizeof($gallary) > 0) {

    for ($i = 0; $i < sizeof($gallary); $i++) {

    $objs = DB::table('product_images')
     ->where('id', $gallary[$i])
     ->first();

     $file_path = 'admin/assets/gallery_product/'.$objs->image;
     unlink($file_path);
     DB::table('product_images')->where('id', $objs->id)->delete();
    /*  $path = 'assets/cusimage/';
    $filename = time()."-".$gallary[$i]->getClientOriginalName();
    $gallary[$i]->move($path, $filename); */

    }


    }
    //dd($objs);
    return redirect(url('admin/product/'.$property_id.'/edit'))->with('del_gallery_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $shop = DB::table('products')->select(
            'products.*',
            'products.id as pro_id',
            'categories.*',
            'shops.*'
            )
            ->leftjoin('shops','shops.id', 'products.shop_id')
            ->leftjoin('categories','categories.id', 'products.cat_id')
            ->where('products.id', $id)
            ->where('products.user_id', Auth::user()->id)
            ->first();

      $data['objs'] = $shop;
    //  dd($shop);

      $cat = DB::table('categories')->select(
            'categories.*'
            )
            ->where('user_id', Auth::user()->id)
            ->orderBy('id', 'asc')
            ->get();

      $data['cat'] = $cat;


      $shop_id = DB::table('shops')->select(
            'shops.*'
            )
            ->where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();

      $data['shop_id'] = $shop_id;

      $img_all = DB::table('product_images')->select(
          'product_images.*'
          )
          ->where('product_id', $id)
          ->get();
      $data['img_all'] = $img_all;

      $data['header'] = 'แก้ไข '.$shop->product_name;
      $data['url'] = url('admin/product/'.$id);
      $data['method'] = "put";
      return view('admin.product.edit',$data);
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
        //
        $image = $request->file('image');

      if($image != NULL){


        $this->validate($request, [
         'image' => 'required|mimes:jpg,jpeg,png,gif|max:8048',
         'product_name' => 'required',
         'product_code' => 'required',
         'product_cat' => 'required',
         'product_sum' => 'required',
         'product_detail' => 'required',
         'shop_name' => 'required',
        ]);

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
         $img = Image::make($image->getRealPath());
         $img->resize(500, 500, function ($constraint) {
         $constraint->aspectRatio();
       })->save('admin/assets/product/'.$input['imagename']);



       $package = product::find($id);
       $package->user_id = Auth::user()->id;
       $package->cat_id = $request['product_cat'];
       $package->product_name = $request['product_name'];
       $package->product_detail = $request['product_detail'];
       $package->product_code = $request['product_code'];
       $package->product_sum = $request['product_sum'];
       $package->product_image = $input['imagename'];
       $package->shop_id = $request['shop_name'];
       $package->save();

       $the_id = $request['id'];


      }else{



        $this->validate($request, [
         'product_name' => 'required',
         'product_code' => 'required',
         'product_cat' => 'required',
         'product_sum' => 'required',
         'product_detail' => 'required',
         'shop_name' => 'required'
        ]);


       $package = product::find($id);
       $package->user_id = Auth::user()->id;
       $package->cat_id = $request['product_cat'];
       $package->product_name = $request['product_name'];
       $package->product_detail = $request['product_detail'];
       $package->product_code = $request['product_code'];
       $package->product_sum = $request['product_sum'];
       $package->shop_id = $request['shop_name'];
       $package->save();

       $the_id = $request['id'];

      }

     return redirect(url('admin/product/'.$id.'/edit'))->with('success_edit_product','เพิ่มร้านค้าสำเร็จแล้วค่ะ');
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
