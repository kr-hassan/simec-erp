<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $remember = $request->input('remember_me');
        if (Auth::attempt($credentials, $remember)) {
            Session::flash('message', "Welcome");
            return redirect()->intended('dashboard');
        }
        Session::flash('message', "Invalid login!");
//        return redirect("/")->withSuccess('Login details are not valid');
        return back();

    }

    public function registration()
    {
        return view('auth.registration');

    }

    public function userRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::create($data);
        Session::flash('message', "Successfully Registered!");
        return back();


    }

    public function userList()
    {
        $users= User::select('name', 'email')->get();
        return view('auth.userlist', compact('users'));
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login');

    }


}
