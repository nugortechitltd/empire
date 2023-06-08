<?php

namespace App\Http\Controllers;

use App\Models\Terms;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    //terms_page
    function terms_page() {
        $terms_info = Terms::all();
        return view('backend.terms.terms', compact('terms_info'));
    }

    // terms_info_store
    function terms_info_store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Terms::insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Terms added successfully');
    }

    // terms_info_delete
    function terms_info_delete($delete_id) {
        Terms::find($delete_id)->delete();
        return back()->withSuccess('Terms deleted successfully');
    }

    // terms_info_edit
    function terms_info_edit($edit_id) {
        $terms = Terms::latest()->take(1);
        return view('backend.terms.terms_edit', compact('terms'));
    }

    // terms_info_update
    function terms_info_update(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Terms::where('id', $request->terms_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Terms updated successfully');
    }
}
