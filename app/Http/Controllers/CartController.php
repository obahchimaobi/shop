<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function remove($id)
    {
        $cart = Cart::where('id', $id)->where('user_email', auth()->user()->email)->where('user_id', auth()->user()->id)->first();
        $cart->delete();

        return redirect()->back()->with('success', 'Item removed from cart');
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::where('id', $id)->where('user_email', auth()->user()->email)->where('user_id', auth()->user()->id)->first();
        $cart->item_quantity = $request->quantity;
        $cart->save();

        return redirect()->back()->with('success', 'Cart updated');
    }
}
