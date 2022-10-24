<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // show login page
    public function showLogin()
    {
        return view('pages.login');
    }
    // show register page
    public function showRegister()
    {
        return view('pages.register');
    }
    // register user
    public function postRegister(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::login($user);
        return back()->with('success', 'Successfully Logged in');
    }
    // login user

    // reset password

    //logout
    public function logout()
    {
        Auth::logout();
        return back();
    }
}
