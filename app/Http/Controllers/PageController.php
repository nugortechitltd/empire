<?php

namespace App\Http\Controllers;

use App\Models\Indexinfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class PageController extends Controller
{
    //index_page
    function index_page() {
        $indexinfo = Indexinfo::all();
        return view('backend.pages.index_page', [
            'indexinfo' => $indexinfo,
        ]);
    }

    // index_info_store
    function index_info_store(Request $request) {
        $request->validate([
            'button' => 'required',
            'image' => 'required|mimes:jpg,jpeg,gif,png,webp,svg|file|max:5000',
        ]);
         // Slide image
         $image = $request->image;
         $extension = $image->getClientOriginalExtension();
         $file_name = 'Slider'.'-'.rand(1000, 9999).'.'.$extension;
         Image::make($image)->save(public_path('uploads/pages/index/'.$file_name));
         Indexinfo::create([
             'button' => $request->button,
             'url' => $request->url,
             'image' => $file_name,
             'created_at' => Carbon::now(),
         ]);
         return back()->withSuccess('Index page added successfully');
    }

    // index_info_delete
    function index_info_delete($index_id) {
        $image = Indexinfo::find($index_id)->image;
        $delete_logo_from = public_path('uploads/pages/index/'.$image);
        unlink($delete_logo_from);
        Indexinfo::find($index_id)->delete();
        return back()->withSuccess('Index page deleted successfully');
    }

    // index_info_edit
    function index_info_edit($index_id) {
        $info = Indexinfo::find($index_id);
        return view('backend.pages.index_page_edit', [
            'info' => $info,
        ]);
    }

    // index_info_store
    function index_info_update(Request $request) {
        $request->validate([
            'button' => 'required',
            'image' => 'mimes:jpg,jpeg,gif,png,webp,svg|file|max:5000',
        ]);
        if($request->image != null) {
            $image = Indexinfo::find($request->index_id)->image;
            $delete_logo_from = public_path('uploads/pages/index/'.$image);
            unlink($delete_logo_from);
            $image = $request->image;
            $extension = $image->getClientOriginalExtension();
            $file_name = 'Slider'.'-'.rand(1000, 9999).'.'.$extension;
            Image::make($image)->save(public_path('uploads/pages/index/'.$file_name));
            Indexinfo::find($request->index_id)->update([
                'image' => $file_name,
                'updated_at' => Carbon::now(),
            ]);
        }      
        Indexinfo::find($request->index_id)->update([
            'button' => $request->button,
            'url' => $request->url,
            'updated_at' => Carbon::now(),
         ]);
         return back()->withSuccess('Index page updated successfully');
        
    }
}
