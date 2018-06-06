<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\stock;
use App\product;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
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
        //
    }

    public function stock_new($id)
    {
      $products = DB::table('products')->select(
              'products.*'
              )
              ->where('user_id', Auth::user()->id)
              ->orderBy('id', 'desc')
              ->get();


              $shop = DB::table('shops')->select(
                  'shops.*'
                  )
                  ->where('user_id', Auth::user()->id)
                  ->get();


        $data['id_pro'] = $id;
        $data['products'] = $products;
        $data['shop'] = $shop;
        $data['method'] = "post";
        $data['url'] = url('admin/stock_add');
        $data['header'] = "สร้างรายการ ของคุณใหม่";
        return view('admin.stock.create2', $data);
    }

    public function stock_edit($id){

      $shop = DB::table('stocks')->select(
            'stocks.*',
            'stocks.id as st_id',
            'stocks.created_at as created_stock',
            'products.*',
            'products.id as id_pro',
            'users.*'
            )
            ->leftjoin('products','products.id', 'stocks.product_id')
            ->leftjoin('users','users.id', 'stocks.user_id')
            ->where('stocks.id', $id)
            ->first();

            $products = DB::table('products')->select(
                  'products.*'
                  )
                  ->orderBy('id', 'desc')
                  ->get();

            $data['products'] = $products;


      $data['stock'] = $shop;
      $data['id_pro'] = $shop->id_pro;
      $data['header'] = 'แก้ไข '.$shop->product_name;
      $data['url'] = url('admin/stock_edit2/');
      $data['method'] = "post";
      return view('admin.stock.edit2',$data);

    }


    public function stock_edit2(Request $request){

      $this->validate($request, [
       'product_id' => 'required',
       'stock_id' => 'required',
       'product_total' => 'required'
      ]);

      $product = DB::table('products')->select(
            'products.*'
            )
            ->where('id', $request['product_id'])
            ->first();



      $stock_c = DB::table('stocks')->select(
            'stocks.*'
            )
            ->where('id', $request['stock_id'])
            ->first();

            $id = $request['stock_id'];

            if($stock_c->product_total == $request['product_total']){

                    $package = stock::find($id);
                    $package->product_id = $request['product_id'];
                    $package->detail = $request['product_detail'];
                    $package->save();

                    return redirect(url('admin/product/'.$request['product_id']))->with('success_stock','เพิ่มร้านค้าสำเร็จแล้วค่ะ');

                  }else if($stock_c->product_total > $request['product_total']){

                    $package = stock::find($id);
                    $package->product_id = $request['product_id'];
                    $package->product_total = $request['product_total'];
                    $package->detail = $request['product_detail'];
                    $package->save();

                    $sum = $stock_c->product_total - $request['product_total'];
                    $package = product::find($request['product_id']);
                    $package->product_sum = $product->product_sum+$sum;
                    $package->save();

                    return redirect(url('admin/product/'.$request['product_id']))->with('success_stock','เพิ่มร้านค้าสำเร็จแล้วค่ะ');
                    //dd($sum);

                  }else{

                    $package = stock::find($id);
                    $package->product_id = $request['product_id'];
                    $package->product_total = $request['product_total'];
                    $package->detail = $request['product_detail'];
                    $package->save();

                    $sum = $request['product_total'] - $stock_c->product_total;
                    $sum = $product->product_sum-$sum;
//dd($sum);

                  //  $sum = $stock_c->product_total - $request['product_total'];
                    $package = product::find($request['product_id']);
                    $package->product_sum = $sum;
                    $package->save();
                    return redirect(url('admin/product/'.$request['product_id']))->with('success_stock','เพิ่มร้านค้าสำเร็จแล้วค่ะ');
                  //  dd($sum);

                  }


    }

    public function stock_add(Request $request)
    {

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
      return redirect(url('admin/product/'.$id))->with('success_stock','เพิ่มร้านค้าสำเร็จแล้วค่ะ');

    }else{

      return redirect(url('admin/stock_new/'.$request['product_id']))->with('error_stock','เพิ่มร้านค้าสำเร็จแล้วค่ะ');

    }

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
