<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_view()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->except(['_token', 'submit']))) {
            return redirect()->route('contacts');
        } else {
            return back()->with(['failure' => 'Invalid login credentials!']);
        }
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $is_registered = User::create($data);

        if ($is_registered) {
            return back()->with(['success' => 'Successfully registered!']);
        } else {
            return back()->with(['failure' => 'Failed to register!']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with(['success' => 'Successfully logged out!']);
    }
}
