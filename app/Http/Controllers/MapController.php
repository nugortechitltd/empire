<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MapController extends Controller
{
    //map_page
    function map_page() {
        $map_info = Map::all();
        return view('backend.map.map', compact('map_info'));
    }

    // map_info_store
    function map_info_store(Request $request) {
        $request->validate([
            'url' => 'required',
        ]);
        Map::insert([
            'name' => $request->name,
            'url' => $request->url,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Map information added successfully');
    }

    // map_delete
    function map_delete($delete_id) {
        Map::find($delete_id)->delete();
        return back()->withSuccess('Map information deleted successfully');
    }
}
