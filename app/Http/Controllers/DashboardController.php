<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
class DashboardController extends Controller
{
     public function index()
    {
        if(Cookie::get('user_id')){
        	 return view('admin.dashboard');

        }else{
        	 return view('login');

        }
       
    }
}
