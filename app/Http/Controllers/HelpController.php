<?php

namespace App\Http\Controllers;

use App\Models\Help;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    
    //help_page
    function help_page() {
        $help_info = Help::all();
        return view('backend.help.help', compact('help_info'));
    }
    // help_info_store
    function help_info_store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Help::insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Help policy added successfully');
    }

    // help_info_delete
    function help_info_delete($delete_id) {
        Help::find($delete_id)->delete();
        return back()->withSuccess('Help policy  deleted successfully');
    }
    // help_info_edit
    function help_info_edit($edit_id) {
        $help = Help::latest()->take(1);
        return view('backend.help.help_edit', compact('help'));
    }
    // help_info_update
    function help_info_update(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Help::where('id', $request->help_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Help policy updated successfully');
    }
}
