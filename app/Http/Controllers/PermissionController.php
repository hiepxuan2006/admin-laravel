<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public function create()
    {
        return view('admin.permission.create');
    }
    public function store(Request $request)
    {
        // dd($request->modul_children);
        $permissionParent = Permission::create([
            'name' => $request->modul_parent,
            'display_name' => $request->modul_parent,
            'parent_id' => 0
        ]);
        foreach ($request->modul_children as $item) {
            $childrenPermission = Permission::create([
                'name' => $item,
                'display_name' => $item,
                'parent_id' => $permissionParent->id,
                'key_permission' => $permissionParent->name . '_' . $item
            ]);
        }
        return redirect(route('permission.create'));
    }
}
