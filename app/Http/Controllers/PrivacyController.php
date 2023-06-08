<?php

namespace App\Http\Controllers;

use App\Models\Privacy;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    //privacy_page
    function privacy_page() {
        $privacy_info = Privacy::all();
        return view('backend.privacy.privacy', [
            'privacy_info' => $privacy_info,
        ]);
    }
    // privacy_info_store
    function privacy_info_store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Privacy::insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Privacy & policy added successfully');
    }

    // privacy_info_delete
    function privacy_info_delete($delete_id) {
        Privacy::find($delete_id)->delete();
        return back()->withSuccess('Privacy & policy deleted successfully');
    }
    // privacy_info_edit
    function privacy_info_edit($edit_id) {
        $privacy = Privacy::latest()->take(1);
        return view('backend.privacy.privacy_edit', compact(['privacy']));
    }

    // privacy_info_update
    function privacy_info_update(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Privacy::where('id', $request->privacy_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Privacy & policy updated successfully');
    }
}
