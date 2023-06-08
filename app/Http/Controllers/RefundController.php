<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    //refund_page
    function refund_page() {
        $refund_info = Refund::all();
        return view('backend.refund.refund', compact('refund_info'));
    }
    // refund_info_store
    function refund_info_store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Refund::insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Refund added successfully');
    }

    // refund_info_delete
    function refund_info_delete($delete_id) {
        Refund::find($delete_id)->delete();
        return back()->withSuccess('Refund deleted successfully');
    }

    // refund_info_edit
    function refund_info_edit($edit_id) {
        $refund = Refund::latest()->take(1);
        return view('backend.refund.refund_edit', compact('refund'));
    }

    function refund_info_update(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Refund::where('id', $request->refund_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Refund updated successfully');
    }
}
