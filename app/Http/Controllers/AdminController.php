<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function add_item()
    {
        return view('admin.components.add_item');
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

    public function add_item_to_cart(Request $request)
    {
        $fields = $request->validate([
            'item_name' => 'required|string',
            'item_description' => 'required|string',
            'item_price_old' => 'required',
            'item_price_new' => 'required',
            'item_image' => 'required|image:jpeg,png,jpg,gif,svg|max:2048',
            'item_category' => 'required|string',
        ]);

        if ($request->hasFile('item_image')) {
            // Store the file and get its path
            $fields['item_image'] = $request->file('item_image')->store('product_image', 'public');

            $file = $request->file('item_image');

            // Generate the path where the file will be stored
            $filePath = 'product_image/' . $file->getClientOriginalName();

            // Check if the file already exists
            if (Storage::disk('public')->exists($filePath)) {
                Log::info('File already exists: ' . $filePath);
            } else {
                // Store the file and get its path
                $fields['item_image'] = $file->storeAs('product_image', $file->getClientOriginalName(), 'public');

                // Log the path of the stored file
                Log::info('Stored image path: ' . $fields['item_image']);
            }
        }

        Item::create($fields);

        return back()->with('success', 'Item added successfully');
    }

    public function all_items()
    {
        $items = Item::all();

        return view('admin.components.all_items', compact('items'));
    }
}
