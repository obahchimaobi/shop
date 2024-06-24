<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Str;
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

            // get the user status to update
            $getUserStatus = User::where('email', $credentials['email'])->first();

            // change the value of the column needed to be changed
            $getUserStatus->isActive = 'true';

            // update the status
            $getUserStatus->update();

            return redirect()->route('home')->with('success', 'Welcome back, ' . $auth_name);
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

        if (Auth::check()) {
            $item = Cart::get();

            return view('auth.my-account', compact('item'));
        } else {
            return redirect()->route('home');
        }
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

    public function remove_cart($id)
    {
        $cart_item = Cart::findOrFail($id);

        $cart_item->delete();

        return redirect()->back()->with('success', 'Item removed from cart');
    }

    public function deactivate_account($id)
    {
        $deactivate_account = User::findOrFail($id);

        $deactivate_account->isActive = 'false';

        $deactivate_account->update();

        Auth::logout();

        return redirect()->route('home')->with('error', 'Account deactivated. Feel free to come back anytime');
    }

    public function verifyAccount($token)
    {
        $getUserByToken = User::where('remember_token', $token)->first();

        if ($getUserByToken) {
            User::where('remember_token', $token)->update(['email_verified_at' => Carbon::now(), 'remember_token' => Str::random(40)]);

            return view('verification.success');
        }

        return view('verification.failed');
    }
}
