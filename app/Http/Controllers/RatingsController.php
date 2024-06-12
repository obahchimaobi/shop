<?php

namespace App\Http\Controllers;

use App\Models\Ratings;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    //

    public function rate(Request $request)
    {
        $request->validate([
            'rate_count' => 'required|string',
            'item_id' => 'required',
            'user_email' => 'required|email|unique:ratings,user_email',
            'user_name' => 'required|string',
            'review' => 'required|string',
        ]);

        $ratings = new Ratings([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'rate_count' => $request->rate_count,
            'item_id' => $request->item_id,
            'review' => $request->review,
        ]);

        $ratings->save();

        return redirect()->back();
    }
}
