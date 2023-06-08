<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Orderreturn;
use App\Models\Paymentinfo;
use App\Models\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // faq
    function faq() {
        $categories = Category::all();
        $shipping_info = Shipping::all();
        $order_return_info = Orderreturn::all();
        $payment_info = Paymentinfo::all();
        return view('frontend.faq.faq_page', [
            'categories' => $categories,
            'shipping_info' => $shipping_info,
            'order_return_info' => $order_return_info,
            'payment_info' => $payment_info,
        ]);
    }
    //faq_info
    function faq_info() {
        $shipping_info = Shipping::all();
        $order_return_info = Orderreturn::all();
        $payment_info = Paymentinfo::all();
        return view('backend.pages.faq.faq', [
            'shipping_info' => $shipping_info,
            'order_return_info' => $order_return_info,
            'payment_info' => $payment_info,
        ]);
    }

    // faq_info_store
    function shipping_info_store(Request $request) {
        $request->validate([
            'question1' => 'required',
            'answer1' => 'required',
        ], [
            'question1.required' => 'The question field is required.',
            'answer1.required' => 'The answer field is required.',
        ]);
        Shipping::insert([
            'question1' => $request->question1,
            'answer1' => $request->answer1,
            'created_at' => Carbon::now(),
        ]);

        return back()->withSuccess('Shipping information added successfully');
    }
    // shipping_info_delete
    function shipping_info_delete($shipping_id) {
        Shipping::find($shipping_id)->delete();
        return back()->withSuccess('Shipping information deleted successfully');
    }
    // order_return_info_store
    function order_return_info_store(Request $request) {
        $request->validate([
            'question2' => 'required',
            'answer2' => 'required',
        ], [
            'question2.required' => 'The question field is required.',
            'answer2.required' => 'The answer field is required.',
        ]);
        Orderreturn::insert([
            'question2' => $request->question2,
            'answer2' => $request->answer2,
            'created_at' => Carbon::now(),
        ]);

        return back()->withSuccess('Order return information added successfully');
    }
    // order_return_info_delete
    function order_return_info_delete($delete_id) {
        Orderreturn::find($delete_id)->delete();
        return back()->withSuccess('Orders and Returns information deleted successfully');
    }
    // payments_info_store
    function payments_info_store(Request $request) {
        $request->validate([
            'question3' => 'required',
            'answer3' => 'required',
        ], [
            'question3.required' => 'The question field is required.',
            'answer3.required' => 'The answer field is required.',
        ]);
        Paymentinfo::insert([
            'question3' => $request->question3,
            'answer3' => $request->answer3,
            'created_at' => Carbon::now(),
        ]);

        return back()->withSuccess('Payments information added successfully');
    }
    // payments_info_delete
    function payments_info_delete($delete_id) {
        Paymentinfo::find($delete_id)->delete();
        return back()->withSuccess('Payments information deleted successfully');
    }
}
