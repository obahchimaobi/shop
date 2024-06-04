<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
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

    public function shopping_cart()
    {
        $cart = Cart::where('user_email', Auth::user()->email)->get();
        return view('pages.shopping-cart', compact('cart'));
    }

    public function item_info($name, $id)
    {
        $item = Item::find($id);

        // fetch products with the same category
        $products = Item::where('item_category', $item->item_category)->where('id', '!=', $id)->get();

        return view('pages.item-info', compact('item'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'item_id' => 'required',
            'item_name' => 'required',
            'item_image' => 'required',
            'item_price_old' => 'required',
            'item_price_new' => 'required',
            'item_category' => 'required',
            'item_description' => 'required'
        ]);

        $check_item = Cart::where('cart_id', $id)->where('user_email', Auth::user()->email)->first();

        if (!$check_item) {
            $cart = new Cart([
                'user_id' => Auth::user()->id,
                'user_email' => Auth::user()->email,
                'cart_id' => $request->item_id,
                'cart_name' => $request->item_name,
                'cart_description' => $request->item_description,
                'cart_price' => $request->item_price_new,
                'cart_image' => $request->item_image,
                'cart_category' => $request->item_category,
                'item_quantity' => '0'
            ]);
    
            $cart->save();
    
            if ($cart->save()) {
                return back()->with('success', 'Item added to cart successfully');
            } else {
                return back()->with('error', 'Failed to add item to cart');
            }
        } else {
            return back()->with('error', 'Item already in cart');
        }
    }
}
