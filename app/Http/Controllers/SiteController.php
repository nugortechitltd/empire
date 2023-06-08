<?php

namespace App\Http\Controllers;

use App\Models\Websitepage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //website_page
    function website_page() {
        $website_info = Websitepage::all();
        return view('backend.website_info.website', compact('website_info'));
    }
    // website_info_store
    function website_info_store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Websitepage::insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Site details added successfully');
    }

    // website_info_delete
    function website_info_delete($delete_id) {
        Websitepage::find($delete_id)->delete();
        return back()->withSuccess('Site details deleted successfully');
    }

    // website_info_edit
    function website_info_edit($edit_id) {
        $website = Websitepage::latest()->take(1);
        return view('backend.website_info.website_edit', compact('website'));
    }

    // website_info_update
    function website_info_update(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Websitepage::where('id', $request->site_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Site details updated successfully');
    }
}
