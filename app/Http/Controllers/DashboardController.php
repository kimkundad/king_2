<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
      $data['header'] = "Dashboard";
      return view('admin.dashboard', $data);
    }
}
