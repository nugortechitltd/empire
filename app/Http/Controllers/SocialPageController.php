<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;

class SocialPageController extends Controller
{
    //socials
    function socials() {
        $socials = Social::all();
        return view('backend.socials.social', [
            'socials' => $socials,
        ]);
    }

    function social_store(Request $request) {
        $request->validate([
            'name' => 'required|unique:socials',
            'social' => 'required',
            'social_url' => 'required',
        ]);
        Social::insert([
            'name'=> Str::lower($request->name),
            'social' => $request->social,
            'social_url' => $request->social_url,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Social added successfully.');
    }
    // social_delete
    function social_delete($social_id) {
        Social::find($social_id)->delete();
        return back()->withSuccess('Social item deleted successfully');
    }
}
