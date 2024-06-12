<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        // User::create($request->all());

        if (User::create($request->all())) {
            return redirect()->route('login-page')->with('success', 'Account registered successfully');
        } else {
            return redirect()->back()->with('error', 'Error registering account');
        }
    }

    public function login(Request $request)
    {
        $remeber = $request->has('remember');



        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $remeber)) {
            $auth_name = Auth::user()->first_name . ' ' . Auth::user()->last_name;

            return redirect()->route('home')->with('success', 'Welcome back .' . $auth_name);
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::logout();

            return redirect()->route('login-page')->with('success', 'Logged out');
        } else {
            return redirect()->back()->with('error', 'Not Logged In');
        }
    }

    public static function cart_number()
    {
        if (Auth::check()) {
            $cart_no = Cart::where('user_id', Auth::user()->id)->count();

            return $cart_no;
        } else {
            // 
            return 0;
        }
    }

    public static function total_price()
    {
        if (Auth::check()) {
            $total_price = Cart::where('user_id', Auth::id())
                ->get()
                ->sum(function ($cart) {
                    return $cart->cart_price * $cart->item_quantity;
                });
            return $total_price;
        } else {
            return 0;
        }
    }

    public function my_account()
    {
        // display only the first last item

        $item = Cart::get();

        return view('auth.my-account', compact('item'));
    }

    public function update_cart(Request $request, $id)
    {
        $item = Cart::findOrFail($id);

        $request->validate([
            'item_quantity' => 'required|integer|min:1',
        ]);

        $item->update(['item_quantity' => $request->item_quantity]);

        // Return a response, e.g., a redirect or a JSON response
        return redirect()->back()->with('success', 'Cart updated successfully');
    }
}
