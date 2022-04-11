<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }
    public function index()
    {
        $roles = $this->role->all();
        return view('admin.role.indexRole', compact('roles'));
    }
    public function create()
    {
        $permissonParents = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.addRole', compact('permissonParents'));
    }
    public function store(AddRoleRequest $request)
    {
        $roleCreate =   $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $roleCreate->PermissionRoleComment()->attach($request->permission_id);
        return redirect(route('role.index'));
    }
    public function edit($id)
    {
        $roleEdit = $this->role->find($id);
        $permissonParents = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.editRole', compact('permissonParents', 'roleEdit'));
    }
    public function update(Request $request, $id)
    {
        $this->role->find($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $roleUpdate = $this->role->find($id);
        $roleUpdate->PermissionRoleComment()->sync($request->permission_id);
        return redirect(route('role.index'));
    }
}
