<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\MemberRequest;
use File;
use Hash;

class MemberController extends Controller
{
    use StorageImageTrait;
    public function index(Request $request)
    {
        $members = Member::orderByDesc('id');
        if (isset($request->name)) {
            $members->where('name', 'like', '%' . $request->name . '%');
        }
        $members = $members->paginate(10);
        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.members.create', compact('roles'));
    }

    public function store(MemberRequest $request)
    {
        $dataUploadImg = $this->storageTraitUpload($request, 'avatar', 'member');
        if(!empty($dataUploadImg)) {
            $data = $request->all();
            $data['avatar'] = $dataUploadImg['file_path'];;
            $data['password'] = Hash::make($request->password);
            $member = Member::create($data);
            $member->roles()->attach($request->role_id);
            return redirect()->route('member.index')->with('success', 'Thêm thành viên thành công');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $member = Member::find($id);
        $roles = Role::all();
        $data = [
            'member' => $member,
            'roles' => $roles
        ];
        return view('admin.members.edit', $data);
    }

    public function update(MemberRequest $request, $id)
    {
        $member = Member::find($id);
        $data = $request->all();
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        } else {
            $data['password'] = $member->password;
        }
        $dataUploadImg = $this->storageTraitUpload($request, 'avatar', 'member');
        if(!empty($dataUploadImg)) {
            $data['avatar'] = $dataUploadImg['file_path'];
            $url_file = substr($member->avatar, 1); // xoa dau / trong url
            if (File::exists($url_file)) {
                unlink($url_file);
            }
        } else {
            $data['avatar'] = $member->avatar;
        }
        $member->update($data);
        return redirect()->route('member.index')->with('success', 'Sửa thông tin thành công');
    }

    public function destroy($id)
    {
        $member = Member::find($id);
        $url_file = substr($member->avatar, 1); // xoa dau / trong url
        if (File::exists($url_file)) {
            unlink($url_file);
        }
        $member->delete();
        return response()->json(['message' => 'Xóa thành công'], 200);
    }
}
