<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //transaction_info
    function transaction_info() {
        $info = Transaction::all();
        return view('backend.transaction.transaction_info', [
            'info' => $info,
        ]);
    }

    // transaction_info_store
    function transaction_info_store(Request $request) {
        $request->validate([
            'bkash' => 'required',
            'type' => 'required',
        ]);

        Transaction::insert([
            'bkash' => $request->bkash,
            'type' => $request->type,
            'description1' => $request->description1,
            'description2' => $request->description2,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Transaction information added successfully');
    }
    // transaction_info_delete
    function transaction_info_delete($transaction_id) {
        Transaction::find($transaction_id)->delete();
        return back()->withSuccess('Transaction information deleted successfully');
    }

    // transaction_list
    function transaction_list() {
        $order_info = OrderProduct::latest()->get();
        return view('backend.transaction.transaction_list', [
            'order_info' => $order_info,
        ]);
    }

    // transaction_show
    function transaction_show($transaction_id) {
        $order_info = OrderProduct::find($transaction_id);
        return view('backend.transaction.transaction_show', [
            'order' => $order_info,
        ]);
    }
}
