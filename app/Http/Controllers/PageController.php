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

    public function store(Request $request, $id)
    {
        if (Auth::check()) {
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
                    'item_quantity' => '1'
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

    public function add_to_wishlist(Request $request, $id)
    {
        if (Auth::check()) {
            $request->validate([
                'item_id' => 'required',
                'item_name' => 'required',
                'item_image' => 'required',
                'item_price_new' => 'required',
            ]);

            $check_item = Wishlist::where('wishlist_id', $id)->where('user_email', Auth::user()->email)->first();

            if (!$check_item) {
                $wishlist = new Wishlist([
                    'user_id' => Auth::user()->id,
                    'user_email' => Auth::user()->email,
                    'wishlist_id' => $request->item_id,
                    'wishlist_name' => $request->item_name,
                    'wishlist_price' => $request->item_price_new,
                    'wishlist_image' => $request->item_image,
                ]);

                $wishlist->save();

                if ($wishlist->save()) {
                    return back()->with('success', 'Item added to wishlist');
                } else {
                    return back()->with('error', 'Failed to add item to cart');
                }
            } else {
                return back()->with('error', 'Item already in your wishlist');
            }
        }
    }
}
