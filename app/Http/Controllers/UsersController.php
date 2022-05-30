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
    public function index()
    {
        $data = Users::users();

        return view("users.users", compact('data'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(CreateUsersRequest $request)
    {
        $data = Users::store($request);

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $record = Users::show($id);
        return view('users.edit', compact('record'));
    }

    public function edit(Request $request, $id)
    {
        $record = Users::edit($id, $request);

        return redirect()->route('users.index');
    }

    public function destroy(Request $request, $id)
    {
        $user = Users::remove($request, $id);

        return redirect()->route('users.index');
    }
}
