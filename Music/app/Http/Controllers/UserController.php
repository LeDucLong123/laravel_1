<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = Users::all();
        return view('customer.index', compact('users'));
    }
    public function create()
    {
        return view('customer.create');
    }
    public function add(Request $request)
    {

        if (!empty($request->role)) {
            $role = ($request->role == 1) ? 1 : 0;
        } else {
            $role = 0;
        }
        Users::create([
            'userName' => $request->input('name'),
            'userAccount' => $request->input('account'),
            'userPassword' => Hash::make($request->input('password')),
            'userRole' => $role
        ]);

        return redirect()->route('user.index')->with('crud', 'Add');
    }
    public function edit($id)
    {
        $user = Users::find($id);
        return view('customer.edit', compact('user'));
    }
    public function updata($id, Request $request)
    {
        $user = Users::find($id);
        $user->userName = $request->input('name');
        $user->userAccount = $request->input('account');
        //nếu nhập mật khẩu thì mới đổi
        if (!empty($request->input('password'))) {
            $user->userPassword = Hash::make($request->input('password'));
        }
        if (!empty($request->role)) {
            $user->userRole = ($request->role == 1) ? 1 : 0;
        }
        $user->save();

        return redirect()->route('user.index')->with('crud', 'Updata');
    }
    public function delete($id)
    {
        Users::find($id)->delete();
        return redirect()->route('user.index')->with('crud', 'Delete');
    }
}
