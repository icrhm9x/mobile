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
use Illuminate\Support\Facades\Log;
use DB;

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
        $roles = Role::all();
        $data = [
            'members' => $members,
            'roles' => $roles
        ];
        return view('admin.members.index', $data);
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.members.add', compact('roles'));
    }

    public function store(MemberRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataUploadImg = $this->storageTraitUpload($request, 'avatar', 'member');
            $data = $request->all();
            $data['avatar'] = $dataUploadImg['file_path'];;
            $data['password'] = Hash::make($request->password);
            $member = Member::create($data);
            $member->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('member.index')->with('success', 'Thêm thành viên thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            $url_file = substr($data['avatar'], 1); // xoa dau / trong url
            if (File::exists($url_file)) {
                unlink($url_file);
            }
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $member = Member::find($id);
        $roles = Role::all();
        $rolesOfMember = $member->roles;
        $data = [
            'member' => $member,
            'roles' => $roles,
            'rolesOfMember' => $rolesOfMember
        ];
        return view('admin.members.edit', $data);
    }

    public function update(MemberRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $member = Member::find($id);
            $data = $request->all();
            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            } else {
                $data['password'] = $member->password;
            }
            $dataUploadImg = $this->storageTraitUpload($request, 'avatar', 'member');
            if (!empty($dataUploadImg)) {
                $data['avatar'] = $dataUploadImg['file_path'];
                $url_file = substr($member->avatar, 1); // xoa dau / trong url
                if (File::exists($url_file)) {
                    unlink($url_file);
                }
            } else {
                $data['avatar'] = $member->avatar;
            }
            $member->update($data);
            $member = Member::find($id);
            $member->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('member.index')->with('success', 'Sửa thông tin thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            $url_file = substr($data['avatar'], 1); // xoa dau / trong url
            if (File::exists($url_file)) {
                unlink($url_file);
            }
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

    public function destroy($id)
    {
        $member = Member::find($id);
        $url_file = substr($member->avatar, 1); // xoa dau / trong url
        if (File::exists($url_file)) {
            unlink($url_file);
        }
        $member->delete();
        $member->roles()->detach();
        return response()->json(['message' => 'Xóa thành công'], 200);
    }
}
