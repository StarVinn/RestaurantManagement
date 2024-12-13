<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'username' => 'Username Salah'
        ])->onlyInput('username');
    }

    public function register(Request $request) {
        $request->validate([
            'username' => ['required'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);
        $newUser = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);
 
        return redirect()->route('post.login')->with('success','User create successfully');
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
