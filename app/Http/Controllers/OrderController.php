<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\stock;
use App\product;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }


    public function new_order($id){

      $product = DB::table('products')->select(
          'products.*'
          )
          ->where('user_id', Auth::user()->id)
          ->get();


      $shop = DB::table('shops')->select(
          'shops.*'
          )
          ->where('id', $id)
          ->first();
        //
        $data['header'] = 'New Order';
        $data['shop'] = $shop;
        $data['product'] = $product;
        $data['method'] = 'post';
        $data['url'] = url('admin/order');
        return view('admin.order.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
         'product_id' => 'required',
         'product_total' => 'required',
         'shop_id' => 'required'
        ]);

        $product = DB::table('products')->select(
              'products.*'
              )
              ->where('id', $request['product_id'])
              ->first();

      if($product->product_sum >= $request['product_total']){

        $package = new stock;
        $package->user_id = Auth::user()->id;
        $package->product_id = $request['product_id'];
        $package->shop_id = $request['shop_id'];
        $package->product_total = $request['product_total'];
        $package->detail = $request['product_detail'];
        $package->save();

        $id = $request['product_id'];

        $sum = $product->product_sum - $request['product_total'];
        $package = product::find($id);
        $package->product_sum = $sum;
        $package->save();
        return redirect(url('admin/shop/'.$request['shop_id']))->with('success_stock','เพิ่มร้านค้าสำเร็จแล้วค่ะ');

      }else{

        return redirect(url('admin/new_order/'.$request['shop_id']))->with('error_stock','เพิ่มร้านค้าสำเร็จแล้วค่ะ');

      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
