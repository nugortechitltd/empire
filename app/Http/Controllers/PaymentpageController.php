<?php

namespace App\Http\Controllers;

use App\Models\Paymentpage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentpageController extends Controller
{
    //payements_page
    function payments_page() {
        $payment_info = Paymentpage::all();
        return view('backend.payment.payment', compact('payment_info'));
    }

    // payments_info_store
    function payment_info_store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Paymentpage::insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Payment information added successfully');
    }

    // payment_info_delete
    function payment_info_delete($delete_id) {
        Paymentpage::find($delete_id)->delete();
        return back()->withSuccess('Payment information deleted successfully');
    }
    // payment_info_edit
    function payment_info_edit($edit_id) {
        $payment = Paymentpage::latest()->take(1);
        return view('backend.payment.payment_edit', compact('payment'));
    }

    // payment_info_update
    function payment_info_update(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Paymentpage::where('id', $request->payment_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Payment information updated successfully');
    }
}
