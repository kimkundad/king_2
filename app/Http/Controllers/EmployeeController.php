<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee;
use Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
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

    public function new_employee($id){

      $data['shop_id'] = $id;
      $data['header'] = 'สร้าง พนักงานใหม่';
      $data['method'] = 'post';
      $data['url'] = url('admin/employee');
      return view('admin.employee.create',$data);

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
             'name' => 'required',
             'phone' => 'required',
             'sex' => 'required',
             'shop_id' => 'required'
         ]);
         $shop_id = $request['shop_id'];

         $package = new employee;
         $package->user_id = Auth::user()->id;
         $package->shop_id = $request['shop_id'];
         $package->name = $request['name'];
         $package->phone = $request['phone'];
         $package->sex = $request['sex'];
         $package->save();

        return redirect(url('admin/shop/'.$shop_id))->with('add_employee_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
      $employee = DB::table('employees')->select(
            'employees.*'
            )
            ->where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->first();

      $data['employee'] = $employee;



      $data['header'] = 'แก้ไข '.$employee->name;
      $data['shop_id'] = $employee->shop_id;
      $data['url'] = url('admin/employee/'.$id);
      $data['method'] = "put";
      return view('admin.employee.edit',$data);
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
      $this->validate($request, [
           'name' => 'required',
           'phone' => 'required',
           'sex' => 'required',
           'shop_id' => 'required'
       ]);
       $shop_id = $request['shop_id'];

       $package = employee::find($id);
       $package->user_id = Auth::user()->id;
       $package->shop_id = $request['shop_id'];
       $package->name = $request['name'];
       $package->phone = $request['phone'];
       $package->sex = $request['sex'];
       $package->save();

      return redirect(url('admin/shop/'.$shop_id))->with('edit_employee_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function employee_del($id){

      $objs = DB::table('employees')
          ->where('id', $id)
          ->first();

      $shop_id = $objs->shop_id;

      $employees = DB::table('employees')
      ->where('id', $id)
      ->delete();

      return redirect(url('admin/shop/'.$shop_id))->with('delete_employee_success','คุณทำการเพิ่มอสังหา สำเร็จ');

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
