<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function shop()
    {
        $shop = Item::paginate(12);
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

    public function wishlist() {
        return view('pages.wishlist');
    }

    public function shopping_cart()
    {
        if (Auth::check()) {
            $cart = Cart::where('user_email', Auth::user()->email)->get();
            return view('pages.shopping-cart', compact('cart'));
        } else {
            return redirect()->back()->with('error', 'Login required');
        }
    }

    public function item_info($name, $id)
    {
        $item = Item::find($id);

        // fetch products with the same category
        $products = Item::where('item_category', $item->item_category)->where('id', '!=', $id)->get();

        return view('pages.item-info', compact('item'));
    }

    
}
