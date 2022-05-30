<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'mail_address',
        'password',
        'address',
        'phone'
    ];

    public static function users()
    {
        return Users::orderBy('mail_address')->paginate(20);
    }

    public static function store(Request $request)
    {
        $users = $request->all();
        $users['password'] = md5($request->password);
        $request->session()->flash('success');

        return  Users::create($users);
    }

    public static function show($id)
    {
        return Users::all()->find($id);
    }

    public static function edit($id, Request $request)
    {
        $data = $request->all();
        $data['password'] = md5($request->password);
        $record = Users::find($id);
        $record->name = $data['name'];
        $record->password = $data['password'];
        $record->address = $data['address'];
        $record->phone = $data['phone'];

        $record->save();
        $request->session()->flash('update');
    }

    public static function remove(Request $request ,$id)
    {
        $user = Users::all()->find($id);
        $request->session()->flash('delete');

        return $user->delete();
    }
}
