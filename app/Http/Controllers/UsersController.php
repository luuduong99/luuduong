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
    //Hien thi user
    public function index (Request $request)
    {
        $data = DB::table("users")->orderBy("id","desc")->paginate(15);
        return view("UsersView.Users",["data"=>$data]);
    }

    //Them user
    public function create (Request $request)
    {
        //tao action de dua vao thuoc tinh action cua the form
        $action = url('admin/users/create');
        return view('UsersView.AddUsers');
    }

    public function createPost (CreateUsersRequest $request)
    {
        $name = $request->get('name');
        $email = $request->get('mail_address');
        $password = $request->get('password');
        $password = md5($password);
        $address = $request->get('address');
        $phone = $request->get('phone');

        DB::table('users')->insert(['name' => $name, 'mail_address' => $email, 'password' => $password, 'address' => $address, 'phone' => $phone]);
        $request->session()->flash('success','Thêm người dùng thành công!');
        return redirect(url('admin/users'));
    }

    //Sua user
    public function update (Request $request, $id)
    {
        $action = url('admin/users/update/$id');
        //lay 1 ban ghi
        $record = DB::table('users')->where('id',$id)->first();
        return view('UsersView.AddUsers', ['record' => $record]);
    }

    public function updatePost (Request $request, $id)
    {
        $name = $request->get('name');
        $password = $request->get('password');
        $password = md5($password);
        $address = $request->get('address');
        $phone = $request->get('phone');

        DB::table('users')->where('id', $id)->update(['name' => $name, 'password' => $password, 'address' => $address, 'phone' => $phone]);
        $request->session()->flash('update','Sửa người dùng thành công!');
        return redirect(url('admin/users'));
    }

    //xoa users
    public function delete (Request $request, $id)
    {
        $action = url('admin/users/delete/$id');
        //xoa users theo id
        DB::table('users')->where('id', $id)->delete();
        $request->session()->flash('delete','Xóa người dùng thành công!');
        //di chuyen den mot url khac
        return redirect(url('admin/users'));
    }
}
