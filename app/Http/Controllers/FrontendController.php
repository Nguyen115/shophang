<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homepage()
    {
        return view('pages.homepage');
    }
    public function aboutus()
    {
        return view('pages.aboutus');
    }
    public function shop()
    {
        return view('pages.shop');
    }
    public function service()
    {
        return view('pages.service');
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
