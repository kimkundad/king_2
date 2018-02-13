<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $shop = DB::table('categories')->select(
            'categories.*'
            )
            ->orderBy('id', 'asc')
            ->get();

            foreach ($shop as $obj) {

                $options = DB::table('products')->where('cat_id',$obj->id)->count();
                $options2 = DB::table('products')->where('cat_id',$obj->id)->sum('products.product_sum');
                $obj->options = $options;
                $obj->options2 = $options2;
            }

      $data['objs'] = $shop;
      $data['header'] = "หมวดหมู่สินค้า";
      return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['method'] = "post";
      $data['url'] = url('admin/category');
      $data['header'] = "สร้างหมวดหมู่ ของคุณใหม่";
      return view('admin.category.create', $data);
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
         'cat_name' => 'required'
        ]);


    $package = new category();
    $package->user_id = Auth::user()->id;
    $package->cat_name = $request['cat_name'];
    $package->save();
    return redirect(url('admin/category'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
