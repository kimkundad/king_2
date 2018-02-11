<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data['template'] = 1;
        return view('home', $data);
    }
    public function shop()
    {
      $data['template'] = 2;
      return view('shop', $data);
    }

    public function sub_shop()
    {
      $data['template'] = 2;
      return view('sub_shop', $data);
    }
    public function album()
    {
      $data['template'] = 2;
      return view('album', $data);
    }

    public function new_album()
    {
      $data['template'] = 2;
      return view('new_album', $data);
    }
}
