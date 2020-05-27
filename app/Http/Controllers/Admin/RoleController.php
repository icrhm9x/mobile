<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissionsParent = Permission::all();
        return view('admin.role.add', compact('permissionsParent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $data = $request->all();
        $role = Role::create($data);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('role.index')->with('success', 'Thêm vai trò thành công');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissionsParent = Permission::whereparentId(0)->get();
        $permissionsChecked = $role->permissions;
        $data = [
            'role' => $role,
            'permissionsParent' => $permissionsParent,
            'permissionsChecked' => $permissionsChecked
        ];
        return view('admin.role.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, $id)
    {
        $role = Role::find($id);
        $data = $request->all();
        $role->update($data);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('role.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        $role->permissions()->detach();
        return redirect()->route('role.index')->with('success', 'Xóa thành công');
    }
}
