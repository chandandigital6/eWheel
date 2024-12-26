<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('frontend.index');
    }

   
    public function e_bike()
    {
        return view('frontend.e_bike');
    }

    public function e_scooter()
    {
        return view('frontend.e_scooter');
    }
    public function e_unicycle()
    {
        return view('frontend.e_unicycle');
    }

    public function e_wheelchair()
    {
        return view('frontend.e_wheelchair');
    }

    public function accessories()
    {
        return view('frontend.accessories');
    }
    public function retail()
    {
        return view('frontend.retail');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function productdetail()
    {
        return view('frontend.productdetail');
    }
  
}
