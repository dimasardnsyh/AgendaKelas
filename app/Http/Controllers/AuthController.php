<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index(){
        if ($user = Auth::user()) {
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'guru') {
                return redirect()->intended('aksesguru');
            }
        }
        return view('login');
        
    }

    public function proseslogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $kredensil = $request->only('email','password');

        if (Auth::attempt($kredensil)){
            $user = Auth::user();
            if($user->level == 'admin'){
                return redirect()->intended('admin');
            }elseif($user->level == 'guru'){
                return redirect()->intended('aksesguru');
            }
            return redirect()->intended('/');
        }
        return redirect('/')->with('error', 'tidak bisa masuk');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
