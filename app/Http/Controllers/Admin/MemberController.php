<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\MemberRequest;
use File;
use Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = Member::orderBy('ruler');
        if(isset($request->name)) $members->where('name', 'like', '%'.$request->name.'%');
        $members = $members->paginate(10);
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            // lấy đuôi file
            $file_name = $file->getClientOriginalExtension();
            // lấy loại file
            $file_type = $file->getMimeType();
            // kích thước file đơn vị byte
            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg') {

                if ($file_size <= 5242880) {

                    $file_name = date('D-m-yyyy') . '-' . rand() . '.' . $file_name;

                    if ($file->move('img/upload/member', $file_name)) {
                        $data = $request->all();
                        $data['avatar'] = $file_name;
                        $data['password'] = Hash::make($request->password);
                        Member::create($data);
                        return redirect()->route('member.index')->with('success', 'Thêm thành viên thành công');
                    }
                } else {
                    return back()->with('error', 'Bạn không thể upload ảnh quá 5mb');
                }
            } else {
                return back()->with('error', 'File bạn chọn không phải là hình ảnh');
            }
        } else {
            return back()->with('error', 'Bạn chưa thêm ảnh đại diện');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, $id)
    {
        $member = Member::find($id);
        $data = $request->all();
        if($request->password){
            $data['password'] = Hash::make($request->password);
        }else{
            $data['password'] = $member->password;
        }
        if($request->status === NULL) {
            $data['status'] = 0;
        }
        if($request->hasFile('avatar')) {
            $file = $request->avatar;
            // lấy đuôi file
            $file_name = $file->getClientOriginalExtension();
            // lấy loại file
            $file_type = $file->getMimeType();
            // kích thước file đơn vị byte
            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg') {

                if ($file_size <= 5242880) {

                    $file_name = date('D-m-yyyy') . '-' . rand() . '.' . $file_name;

                    if ($file->move('img/upload/member', $file_name)) {
                        $data['avatar'] = $file_name;
                        if (File::exists('img/upload/member/' . $member->avatar && $member->avatar != Null)) {
                            unlink('img/upload/member/' . $member->avatar);
                        }
                    }
                } else {
                    return back()->with('error', 'Bạn không thể upload ảnh quá 5mb');
                }
            } else {
                return back()->with('error', 'File bạn chọn không phải là hình ảnh');
            }
        } else {
            $data['avatar'] = $member->avatar;
        }
        $member->update($data);
        return redirect()->route('member.index')->with('success', 'Sửa thông tin thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        if (File::exists('img/upload/member/' . $member->avatar)) {
            unlink('img/upload/member/' . $member->avatar);
        }
        $member->delete();
        return response()->json(['message' => 'Xóa thành công'], 200);
    }
}
