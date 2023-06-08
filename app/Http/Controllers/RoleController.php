<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //role
    function role() {
        return view('backend.role.role');
    }

    public function permission_store(Request $request) {
        Permission::create(['name' => $request->permission]);
        return back()->with('permission', $request->permission.' permission created successfully');
    }
}
