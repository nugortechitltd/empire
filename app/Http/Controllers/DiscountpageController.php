<?php

namespace App\Http\Controllers;

use App\Models\Discountpage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiscountpageController extends Controller
{
    //discount_page
    function discount_page() {
        $validity = Discountpage::all();
        return view('backend.pages.discount_page', compact('validity'));
    }

    // validity_store
    function validity_store(Request $request) {
        $request->validate([
            'flash_validity'=> 'required',
        ]);

        Discountpage::insert([
            'flash_validity' => $request->flash_validity,
            'offer_validity' => $request->offer_validity,
            'campaign_validity' => $request->campaign_validity,
            'created_at' => Carbon::now(),
        ]);

        return back()->withSuccess('Validity added successfully');
    }

    // validity_info_delete
    function validity_info_delete($validity_id) {
        Discountpage::find($validity_id)->delete();
        return back()->withSuccess('Validity deleted successfully');
    }
}
