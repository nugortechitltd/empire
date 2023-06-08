<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    //setting_info
    function setting_info() {
        return view('backend.setting.setting');
    }

    function setting_info_store(Request $request) {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'copyright' => 'required',
            'setting_info' => 'required',
            // 'keywords' => 'required',
            // 'description' => 'required',
            'logo' => 'required|mimes:png|max:5000',
            'favicon' => 'required|mimes:png,webp,ico|max:5000',
            'app_image' => 'required|mimes:jpg,jpeg,gif,png,webp,svg|file|max:5000',
        ]);

        $setting_id = Setting::insertGetId([
            'name' => $request->name,
            'title' => $request->title,
            'copyright' => $request->copyright,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'setting_info' => $request->setting_info,
            'created_at' => Carbon::now(),
        ]);
        // Logo
        $logo = $request->logo;
        $extension = $logo->getClientOriginalExtension();
        $file_name = 'Logo'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($logo)->save(public_path('uploads/settings/logo/'.$file_name));
        
        Setting::find($setting_id)->update([
            'logo' => $file_name,
            'updated_at' => Carbon::now(),
        ]);
        // Favicon
        $favicon = $request->favicon;
        $extension = $favicon->getClientOriginalExtension();
        $file_name = 'favicon'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($favicon)->save(public_path('uploads/settings/favicon/'.$file_name));
        
        Setting::find($setting_id)->update([
            'favicon' => $file_name,
            'updated_at' => Carbon::now(),
        ]);
        // app_image
        $app_image = $request->app_image;
        $extension = $app_image->getClientOriginalExtension();
        $file_name = 'app-image'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($app_image)->save(public_path('uploads/settings/app_image/'.$file_name));
        
        Setting::find($setting_id)->update([
            'app_image' => $file_name,
            'updated_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Setting added successfully.');
    }

    // setting_info_list
    function setting_info_list() {
        $settings = Setting::all();
        return view('backend.setting.setting_list', [
            'settings' => $settings,
        ]);
    }

    // setting_delete
    function setting_delete($setting_id) {
        // logo delete
        $logo = Setting::find($setting_id)->logo;
        $delete_logo_from = public_path('uploads/settings/logo/'.$logo);
        unlink($delete_logo_from);
        
        // Favicon delete
        $favicon = Setting::find($setting_id)->favicon;
        $delete_favicon_from = public_path('uploads/settings/favicon/'.$favicon);
        unlink($delete_favicon_from);
        
        // Favicon delete
        $app_image = Setting::find($setting_id)->app_image;
        $delete_app_image_from = public_path('uploads/settings/app_image/'.$app_image);
        unlink($delete_app_image_from);

        Setting::find($setting_id)->delete();
        return back()->withSuccess('Setting deleted successfully');
    }

    // setting_edit
    function setting_edit($setting_id) {
        $settings = Setting::all();
        return view('backend.setting.setting_edit', [
            'setting' => $settings,
        ]);
    }

    // setting_update
    function setting_update(Request $request) {
        $data = Setting::find($request->setting_id)->logo;
        // print_r($data);

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'copyright' => 'required',
            'setting_info' => 'required',
            'logo' => 'mimes:png|max:5000',
            'favicon' => 'mimes:png,webp,ico|max:5000',
            'app_image' => 'mimes:jpg,jpeg,gif,png,webp,svg|file|max:5000',
        ]);

        if($request->logo != null) {
            $logo = Setting::find($request->setting_id)->logo;
            $delete_logo_from = public_path('uploads/settings/logo/'.$logo);
            unlink($delete_logo_from);
            $logo = $request->logo;
            $extension = $logo->getClientOriginalExtension();
            $file_name = 'Logo'.'-'.rand(1000, 9999).'.'.$extension;
            Image::make($logo)->save(public_path('uploads/settings/logo/'.$file_name));
            Setting::find($request->setting_id)->update([
                'logo' => $file_name,
                'updated_at' => Carbon::now(),
            ]);
        }
        if($request->favicon != null) {
            $favicon = Setting::find($request->setting_id)->favicon;
            $delete_favicon_from = public_path('uploads/settings/favicon/'.$favicon);
            unlink($delete_favicon_from);
            $favicon = $request->favicon;
            $extension = $favicon->getClientOriginalExtension();
            $file_name2 = 'favicon'.'-'.rand(1000, 9999).'.'.$extension;
            Image::make($favicon)->save(public_path('uploads/settings/favicon/'.$file_name2));
            Setting::find($request->setting_id)->update([
                'favicon' => $file_name2,
                'updated_at' => Carbon::now(),
            ]);
        }
        if($request->app_image != null) {
            $app_image = Setting::find($request->setting_id)->app_image;
            $delete_app_image_from = public_path('uploads/settings/app_image/'.$app_image);
            unlink($delete_app_image_from);
            $app_image = $request->app_image;
            $extension = $app_image->getClientOriginalExtension();
            $file_name3 = 'app_image'.'-'.rand(1000, 9999).'.'.$extension;
            Image::make($app_image)->save(public_path('uploads/settings/app_image/'.$file_name3));
            Setting::find($request->setting_id)->update([
                'app_image' => $file_name3,
                'updated_at' => Carbon::now(),
            ]);
        }
        Setting::find($request->setting_id)->update([
            'name' => $request->name,
            'title' => $request->title,
            'copyright' => $request->copyright,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'setting_info' => $request->setting_info,
            'updated_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Setting updated successfully');
    }

    // Setting status
    function setting_info_status($setting_id) {
        $setting = Setting::find($setting_id);
        if($setting->status == 1){
            Setting::find($setting_id)->update([
                'status'=>0,
            ]);
        }
        else{
            foreach(Setting::all() as $contact){
                Setting::find($contact->id)->update([
                    'status'=>0,
                ]);
            }
            Setting::find($setting_id)->update([
                'status' => 1,
            ]);
        }
        return back();
    }
}
