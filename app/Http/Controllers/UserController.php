<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\TraitsSoftDelete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    use TraitsSoftDelete;
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function index()
    {
        $users = $this->user->paginate(10);
        return view('admin.user.indexUser', compact('users'));
    }
    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.addUser', compact('roles'));
    }
    public function store(UserAddRequest $request)
    {
        try {
            //code...
            DB::beginTransaction();
            $dataUserCreate = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
            $user = $this->user->create($dataUserCreate);
            $role_ids = $request->role_id;
            $user->roleComment()->attach($role_ids);
            DB::commit();
            return redirect(route('user.index'));
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
    }
    public function edit($id)
    {
        $user = $this->user->find($id);
        $roleUser = $user->roleComment;
        $roles = $this->role->all();
        return view('admin.user.editUser', compact('user', 'roleUser', 'roles'));
    }
    public function update(UserUpdateRequest $request, $id)
    {
        try {
            //code...
            DB::beginTransaction();
            $dataUserCreate = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
            $this->user->find($id)->update($dataUserCreate);
            $user = $this->user->find($id);
            $role_ids = $request->role_id;
            $user->roleComment()->sync($role_ids);
            DB::commit();
            return redirect(route('user.index'));
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
    }
    public function del($id)
    {
        return $this->TraitsSoftDelete($id, $this->user);
    }
}
