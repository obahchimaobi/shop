<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function store(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $userEmail = Auth::user()->email;
            $productId = $request->input('id');
            $productName = $request->input('name');
            $productImage = $request->input('image');
            $productPriceNew = $request->input('price_new');
            $productCategory = $request->input('category');
            $productDescription = $request->input('description');

            $cartItem = Cart::where('cart_id', $productId)
                ->where('user_id', $userId)
                ->first();

            if ($cartItem) {
                $cartItem->increment('item_quantity', 1);
                return response()->json(['alreadyInCart' => true]);
            } else {
                $cart = new Cart([
                    'user_id' => $userId,
                    'user_email' => $userEmail,
                    'cart_id' => $productId,
                    'cart_name' => $productName,
                    'cart_description' => $productDescription,
                    'cart_price' => $productPriceNew,
                    'cart_image' => $productImage,
                    'cart_category' => $productCategory,
                    'item_quantity' => 1
                ]);

                $cart->save();

                return response()->json(['alreadyInCart' => false]);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function add_to_wishlist(Request $request)
    {
        if (Auth::check()) {

            $isWishList = Wishlist::where('wishlist_id', $request->wishlist_id)->where('user_id', Auth::user()->id)->exists();

            if ($isWishList) {
                return response()->json(['alreadyInWishlist' => true]);
            }

            $productId = $request->input('wishlist_id');
            $productName = $request->input('wishlist_name');
            $productImage = $request->input('wishlist_image');
            $productPriceNew = $request->input('wishlist_price');

            $check_item = Wishlist::where('wishlist_id', $productId)->where('user_id', Auth::user()->id)->exists();

            if (!$check_item) {
                $wishlist = new Wishlist([
                    'user_id' => Auth::user()->id,
                    'user_email' => Auth::user()->email,
                    'wishlist_id' => $productId,
                    'wishlist_name' => $productName,
                    'wishlist_image' => $productImage,
                    'wishlist_price' => $productPriceNew,
                ]);

                $wishlist->save();
            }
        }
    }

    public function remove(Request $request)
    {
        if (Auth::check()) {
            $cart = Cart::where('id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->exists();

            if ($cart) {
                Cart::where('id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->first()->delete();
                
                return response()->json(['success' => true, 'message' => 'Item removed from cart']);
            } else {
                return response()->json(['success' => false, 'message' => 'Item not found in cart'], 404);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'You must login to remove items'], 401);
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $cart = Cart::where('id', $request->id)->where('user_id', auth()->user()->email)->where('user_id', auth()->user()->id)->first();
            $cart->item_quantity = $request->quantity;
            $cart->save();

            return redirect()->back()->with('success', 'Cart updated');
        } else {
            return back()->with('error', 'You must login to add item');
        }
    }
}
