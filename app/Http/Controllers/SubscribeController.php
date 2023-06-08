<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    //subscribe_store
    function subscribe_store(Request $request) {
        $request->validate([
            'subscribe' => 'required|unique:subscribes',
        ]);
        Subscribe::insert([
            'subscribe'=> $request->subscribe,
            'created_at' => Carbon::now(),
        ]);

        return back()->withSuccess('Subscribed successfully!');
    }
    // subscribe_list
    function subscribe_list() {
        $subscribers = Subscribe::all();
        return view('backend.subscriber.subscriber', [
            'subscribers' => $subscribers,
        ]);
    }
    // subscribe_delete
    function subscribe_delete($sub_id) {
        Subscribe::find($sub_id)->delete();
        return back()->withSuccess('One subscriber deleted successfully');
    }
}
