<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function shop()
    {
        return view('pages.shop');
    }

    public function about_us()
    {
        return view('pages.about-us');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function login_page()
    {
        return view('auth.login');
    }

    public function register_page()
    {
        return view('auth.register');
    }
}
