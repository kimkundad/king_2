<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\brander;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class BranderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brander = DB::table('branders')->select(
            'branders.*'
            )
            ->where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();

      $data['objs'] = $brander;
      $data['header'] = "Brand";
      return view('admin.brander.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $data['method'] = "post";
      $data['url'] = url('admin/brander');
      $data['header'] = "สร้าง Brand ของคุณใหม่";
      return view('admin.brander.create', $data);
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
     'brand_name' => 'required',
     'brand_group' => 'required',
     'brand_type' => 'required'
    ]);

    $image = $request->file('image');

      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
       $img = Image::make($image->getRealPath());
       $img->resize(500, 500, function ($constraint) {
       $constraint->aspectRatio();
     })->save('admin/assets/product/'.$input['imagename']);

     $package = new brander;
     $package->user_id = Auth::user()->id;
     $package->branders_name = $request['brand_name'];
     $package->branders_group = $request['brand_group'];
     $package->branders_type = $request['brand_type'];
     $package->branders_image = $input['imagename'];
     $package->branders_status = 0;
     $package->save();

     $the_id = $package->id;

     return redirect(url('admin/brander/'.$the_id))->with('success_brander','เพิ่มร้านค้าสำเร็จแล้วค่ะ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $brander = DB::table('branders')->select(
          'branders.*'
          )
          ->where('id', $id)
          ->where('user_id', Auth::user()->id)
          ->first();

      $data['brander'] = $brander;
      $data['url'] = url('admin/brander/'.$id);
      $data['method'] = "put";
      $data['header'] = 'ข้อมูลของ '.$brander->branders_name;
      return view('admin.brander.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $brander = DB::table('branders')->select(
          'branders.*'
          )
          ->where('id', $id)
          ->where('user_id', Auth::user()->id)
          ->first();

      $data['brander'] = $brander;

      $data['header'] = 'แก้ไข '.$brander->branders_name;
      $data['url'] = url('admin/brander/'.$id);
      $data['method'] = "put";
      return view('admin.brander.edit',$data);
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
