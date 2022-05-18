<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\CreateUsersRequest;

class UsersController extends Controller
{
    public function index (Request $request)
    {
        $data = Users::query()->orderByDesc('id')->paginate(20);
        return view("admin.users", compact('data'));
    }

    public function create (Request $request)
    {
        return view('admin.add');
    }

    public function createUsers (CreateUsersRequest $request)
    {
        $data = $request->all();
        $data['password'] = md5($request->password);
        Users::create($data);
        return redirect()->route('users')->with('success', 'Thêm người dùng thành công!');
    }

    public function update (Request $request, $id)
    {
        $record = Users::all()->find($id);
        return view('admin.add', compact('record'));
    }

    public function updateUsers (Request $request, $id)
    {
        $data = $request->all();
        $data['password'] = md5($request->password);
        $record = Users::find($id);
        $record->name = $data['name'];
        $record->password = $data['password'];
        $record->address = $data['address'];
        $record->phone = $data['phone'];

        $record->save();
        return redirect()->route('users')->with('update', 'Sửa người dùng thành công!');
    }

    public function delete (Request $request, $id)
    {
        $user = Users::all()->find($id);
        $user->delete();
        return redirect()->route('users')->with('delete', 'Xóa người dùng thành công!');
    }
}
