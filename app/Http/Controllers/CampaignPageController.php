<?php

namespace App\Http\Controllers;

use App\Models\Campaignpage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class CampaignPageController extends Controller
{
    //campaign_page
    function campaign_page() {
        $campaign_info = Campaignpage::all();
        return view('backend.pages.campaign_page', [
            'campaign_info' => $campaign_info,
        ]);
    }
    // campaign_info_store
    function campaign_info_store(Request $request) {
        $request->validate([
            'button' => 'required',
            'image' => 'required|mimes:jpg,jpeg,gif,png,webp,svg|file|max:5000',
        ]);
         // Slide image
         $image = $request->image;
         $extension = $image->getClientOriginalExtension();
         $file_name = 'Slider'.'-'.rand(1000, 9999).'.'.$extension;
         Image::make($image)->save(public_path('uploads/pages/campaign/'.$file_name));
         Campaignpage::create([
             'button' => $request->button,
             'url' => $request->url,
             'image' => $file_name,
             'created_at' => Carbon::now(),
         ]);

       return back()->withSuccess('campaign added successfully');
    }

    // campaign_info_delete
    function campaign_info_delete($campaign_id) {
        $image = Campaignpage::find($campaign_id)->image;
        $delete_logo_from = public_path('uploads/pages/campaign/'.$image);
        unlink($delete_logo_from);
        Campaignpage::find($campaign_id)->delete();
        return back()->withSuccess('campaign page deleted successfully');
    }

    // campaign_info_edit
    function campaign_info_edit($campaign_id) {
        $info = Campaignpage::find($campaign_id);
        return view('backend.pages.campaign_page_edit', [
            'info' => $info,
        ]);
    }

    // campaign_info_update
    function campaign_info_update(Request $request) {
        $request->validate([
            'button' => 'required',
            'image' => 'mimes:jpg,jpeg,gif,png,webp,svg|file|max:5000',
        ]);
        if($request->image != null) {
            $image = Campaignpage::find($request->campaign_id)->image;
            $delete_logo_from = public_path('uploads/pages/campaign/'.$image);
            unlink($delete_logo_from);
            $image = $request->image;
            $extension = $image->getClientOriginalExtension();
            $file_name = 'Slider'.'-'.rand(1000, 9999).'.'.$extension;
            Image::make($image)->save(public_path('uploads/pages/campaign/'.$file_name));
            Campaignpage::find($request->campaign_id)->update([
                'image' => $file_name,
                'updated_at' => Carbon::now(),
            ]);
        }   
        Campaignpage::find($request->campaign_id)->update([
            'button' => $request->button,
            'url' => $request->url,
            'updated_at' => Carbon::now(),
        ]);

        return back()->withSuccess('campaign updated successfully');
    }
    
}
