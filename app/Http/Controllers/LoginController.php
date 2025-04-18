<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->level == 'admin'){
                return redirect()->intended('/admin')->with('admin', 'Selamat datang Admin!');
            }if (Auth::user()->level == 'petugas'){
                return redirect()->intended('/admin')->with('petugas', 'Selamat datang petugas!');
            }elseif (Auth::user()->level == 'user') {
                return redirect()->intended('/dashboard')->with('success', 'Login Berhasil!');
            }
        }
        return back()->with('loginError', 'Login Gagal!');
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}