<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\album;
use App\album_photo;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
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


    public function new_album($id){

      $data['shop_id'] = $id;
      $data['header'] = 'New Album';
      $data['method'] = 'post';
      $data['url'] = url('admin/albums');
      return view('admin.albums.create',$data);

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
      return redirect(url('admin/shop/'.$shop_id))->with('add_album_photo_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
