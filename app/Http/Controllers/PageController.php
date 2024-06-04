<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function shop()
    {
        $shop = Item::all();
        return view('pages.shop', compact('shop'));
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

    public function item_info($name, $id)
    {
        $item = Item::find($id);

        return view('pages.item-info', compact('item'));
    }
}
