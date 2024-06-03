<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function admin_login_page()
    {
        return view('admin.auth.login');
    }

    public function admin_register_page()
    {
        return view('admin.auth.register');
    }

    public function admin_register(Request $request)
    {
        $request->validate([
            'admin_name' => 'required|string',
            'admin_email' => 'required|email|unique:admins',
            'admin_password' => 'required|min:6',
        ]);

        $admin = new Admin([
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'admin_password' => Hash::make($request->admin_password),
        ]);

        $admin->save();

        if ($admin->save()) {
            return redirect()->route('admin.login-page')->with('success', 'Admin registered successfully');
        } else {
            return back()->with('error', 'Failed to register admin');
        }
    }

    public function admin_login(Request $request)
    {
        $remember = $request->has('remember') ? true : false;

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['admin_email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('error', 'Invalid login credentials');
        }
    }
}
