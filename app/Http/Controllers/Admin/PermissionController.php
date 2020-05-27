<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    private $html;
    public function __construct()
    {
        $this->html = '';
    }

    public function index()
    {
        $permissions = Permission::paginate(10);
        return view('admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        $data = Permission::all();
        $html = $this->recusiveAdd($data);
        return view('admin.permission.add', compact('html'));
    }

    private function recusiveAdd($data, $parent_id = 0, $text = '')
    {
        foreach ($data as $value) {
            if ($value['parent_id'] == $parent_id) {
                $this->html .= "<option value=" . $value->id . ">" . $text . $value['name'] . "</option>";
                $this->recusiveAdd($data, $value['id'], $text . '--');
            }
        }
        return $this->html;
    }

    public function store(PermissionRequest $request)
    {
        $data = $request->all();
        Permission::create($data);
        return redirect()->route('permission.index')->with('success', 'Thêm quyền thành công');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        $data = Permission::all();
        $html = $this->recusiveEdit($data, $permission->parent_id);
        return view('admin.permission.edit', compact('permission', 'html'));
    }

    private function recusiveEdit($data, $idSelect, $parent_id = 0, $text = '')
    {
        foreach ($data as $value) {
            if ($value['parent_id'] == $parent_id) {
                if($idSelect == $value['id']) {
                    $this->html .= "<option selected value=" . $value->id . ">" . $text . $value['name'] . "</option>";
                } else {
                    $this->html .= "<option value=" . $value->id . ">" . $text . $value['name'] . "</option>";
                }
                $this->recusiveEdit($data, $idSelect, $value['id'], $text . '--');
            }
        }
        return $this->html;
    }

    public function update(PermissionRequest $request, $id)
    {
        $permission = Permission::find($id);
        $data = $request->all();
        $permission->update($data);
        return redirect()->route('permission.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        $permission->Roles()->detach();
        return redirect()->route('permission.index')->with('success', 'Xóa thành công');
    }
}
