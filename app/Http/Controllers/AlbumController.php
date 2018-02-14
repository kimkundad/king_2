<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\album;
use App\album_photo;
use App\fileshop;
use File;
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


    public function new_file($id){

      $data['shop_id'] = $id;
      $data['header'] = 'New File';
      $data['method'] = 'post';
      $data['url'] = url('admin/add_file');
      return view('admin.file_shop.create',$data);

    }

    public function add_file(Request $request)
    {

      $this->validate($request, [
           'file' => 'required',
           'album_name' => 'required',
           'shop_id' => 'required',
           'file' => 'required'
       ]);
        $shop_id = $request['shop_id'];
       $file = $request->file('file');

        $destinationPath = 'admin/assets/shop_file/';
        $input['file'] = time().'.'.$file->getClientOriginalExtension();
        $request->file('file')->move($destinationPath, $input['file']);

         $package = new fileshop;
         $package->user_id = Auth::user()->id;
         $package->shop_id = $request['shop_id'];
         $package->name_file = $request['album_name'];
         $package->file_sheet = $input['file'];
         $package->save();
        return redirect(url('admin/shop/'.$shop_id))->with('add_album_file_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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


    public function del_file_shop($id)
    {
      $objs = DB::table('fileshops')
      ->where('id', $id)
      ->first();

      $url_course = 'admin/assets/shop_file/'.$objs->file_sheet;
      File::delete($url_course);

      $obj = DB::table('fileshops')
      ->where('id', $id)
      ->delete();

      return back()->with('delete_file','ลบข้อมูล สำเร็จ');
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
      $shop_id = DB::table('albums')->select(
            'albums.*'
            )
            ->where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->first();

      $data['shop_id'] = $shop_id;

      $img_all = DB::table('album_photos')->select(
          'album_photos.*'
          )
          ->where('album_id', $id)
          ->get();

      $data['img_all'] = $img_all;

      $data['header'] = 'แก้ไข '.$shop_id->name;
      $data['url'] = url('admin/albums/'.$id);
      $data['method'] = "put";
      return view('admin.albums.edit',$data);
    }



    public function property_imageshop_del(Request $request){
    $property_id = $request['a_id'];

    $gallary = $request->get('product_image');

    if (sizeof($gallary) > 0) {

    for ($i = 0; $i < sizeof($gallary); $i++) {

    $objs = DB::table('album_photos')
     ->where('id', $gallary[$i])
     ->first();

     $file_path = 'admin/assets/gallery_shop/'.$objs->image;
     unlink($file_path);
     DB::table('album_photos')->where('id', $objs->id)->delete();
    /*  $path = 'assets/cusimage/';
    $filename = time()."-".$gallary[$i]->getClientOriginalName();
    $gallary[$i]->move($path, $filename); */

    }


    }
    //dd($objs);
    return redirect(url('admin/albums/'.$property_id.'/edit'))->with('del_gallery_success','คุณทำการเพิ่มอสังหา สำเร็จ');

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

      $gallary = $request->file('product_image');


      if($gallary == NULL){

        $this->validate($request, [
         'shop_id' => 'required',
         'album_name' => 'required'
        ]);

        $package = album::find($id);
        $package->user_id = Auth::user()->id;
        $package->name = $request['album_name'];
        $package->save();

       return redirect(url('admin/albums/'.$id.'/edit'))->with('success_edit_product','คุณทำการแก้ไขอสังหา สำเร็จ');

      }else{

        $this->validate($request, [
         'shop_id' => 'required',
         'album_name' => 'required'
        ]);


        if (sizeof($gallary) > 0) {

         for ($i = 0; $i < sizeof($gallary); $i++) {

           $path = 'admin/assets/gallery_shop/';
           $filename = time()."-".$gallary[$i]->getClientOriginalName();
           $gallary[$i]->move($path, $filename);


           $admins[] = [
               'album_id' => $id,
               'image' => $filename,
           ];


         }
         album_photo::insert($admins);
       }





        $package = album::find($id);
        $package->user_id = Auth::user()->id;
        $package->name = $request['album_name'];
        $package->save();

       return redirect(url('admin/albums/'.$id.'/edit'))->with('success_edit_product','คุณทำการแก้ไขอสังหา สำเร็จ');


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
