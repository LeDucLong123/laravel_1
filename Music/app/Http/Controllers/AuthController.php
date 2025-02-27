<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['userAccount' => $request->account, 'password' => $request->password])) {
            // $user = Auth::user();
            // echo "$user->userName";
            return redirect()->route('user.index');
        } else {
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:30',
            'account' => 'required|min:4|max:30',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required'
        ]);
        if (!Users::where('userAccount', $request->input('account'))->get()->isEmpty()) {
            return redirect()->back()->withErrors(['account_exists' => 'Account Exists']);
        }
        Users::create([
            'userName' => $request->input('name'),
            'userAccount' => $request->input('account'),
            'userPassword' => Hash::make($request->input('password')),
            'userRole' => 0
        ]);
        return redirect('/login');
    }
    public function register()
    {
        Auth::logout();
        return redirect()->route('register');
    }
}
