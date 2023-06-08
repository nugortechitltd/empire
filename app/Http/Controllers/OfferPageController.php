<?php

namespace App\Http\Controllers;

use App\Models\Offerpage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class OfferPageController extends Controller
{
    //offer_page
    function offer_page() {
        $offer_info = Offerpage::all();
        return view('backend.pages.offer_page', [
            'offer_info' => $offer_info,
        ]);
    }
    // offer_info_store
    function offer_info_store(Request $request) {
        $request->validate([
            'button' => 'required',
            'image' => 'required|mimes:jpg,jpeg,gif,png,webp,svg|file|max:5000',
        ]);
         // Slide image
         $image = $request->image;
         $extension = $image->getClientOriginalExtension();
         $file_name = 'Slider'.'-'.rand(1000, 9999).'.'.$extension;
         Image::make($image)->save(public_path('uploads/pages/offer/'.$file_name));
         Offerpage::create([
             'button' => $request->button,
             'url' => $request->url,
             'image' => $file_name,
             'created_at' => Carbon::now(),
         ]);

       return back()->withSuccess('Offer added successfully');
    }

    // offer_info_delete
    function offer_info_delete($offer_id) {
        $image = Offerpage::find($offer_id)->image;
        $delete_logo_from = public_path('uploads/pages/offer/'.$image);
        unlink($delete_logo_from);
        Offerpage::find($offer_id)->delete();
        return back()->withSuccess('Offer page deleted successfully');
    }

    // offer_info_edit
    function offer_info_edit($offer_id) {
        $info = Offerpage::find($offer_id);
        return view('backend.pages.offer_page_edit', [
            'info' => $info,
        ]);
    }


    // offer_info_update
    function offer_info_update(Request $request) {
        $request->validate([
            'button' => 'required',
            'image' => 'mimes:jpg,jpeg,gif,png,webp,svg|file|max:5000',
        ]);
        if($request->image != null) {
            $image = Offerpage::find($request->offer_id)->image;
            $delete_logo_from = public_path('uploads/pages/offer/'.$image);
            unlink($delete_logo_from);
            $image = $request->image;
            $extension = $image->getClientOriginalExtension();
            $file_name = 'Slider'.'-'.rand(1000, 9999).'.'.$extension;
            Image::make($image)->save(public_path('uploads/pages/offer/'.$file_name));
            Offerpage::find($request->offer_id)->update([
                'image' => $file_name,
                'updated_at' => Carbon::now(),
            ]);
        } 
        Offerpage::find($request->offer_id)->update([
            'button' => $request->button,
            'url' => $request->url,
            'updated_at' => Carbon::now(),
        ]);

        return back()->withSuccess('Offer updated successfully');
    }
}
