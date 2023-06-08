<?php

namespace App\Http\Controllers;

use App\Models\Shippingpage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingpageController extends Controller
{
    //shipping_page
    function shipping_page() {
        $shipping_info = Shippingpage::all();
        return view('backend.shipping.shipping', compact('shipping_info'));
    }

    // shipping_info_store
    function shipping_info_store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Shippingpage::insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Shipping added successfully');
    }

    // shipping_info_delete
    function shipping_delete($delete_id) {
        Shippingpage::find($delete_id)->delete();
        return back()->withSuccess('Shipping deleted successfully');
    }

    // shipping_edit
    function shipping_edit($edit_id) {
        $shipping = Shippingpage::latest()->take(1);
        return view('backend.shipping.shipping_edit', compact('shipping'));
    }

    // shipping_info_update
    function shipping_info_update(Request $request) {
        // print_r($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Shippingpage::where('id', $request->shipping_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Shipping updated successfully');
    }
}
