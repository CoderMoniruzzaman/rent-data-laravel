<?php

namespace App\Http\Controllers;

use App\User;

class HomeController extends Controller
{

    public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('role');
     }


    public function index()
    {
        $all_users = User::all();
      return view('home', compact('all_users'));
    }
}
