<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Validated;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request){
       $validatedData = $request->validate([
        'name' => 'required|max:255',
        'nik' => 'required|min:16|max:16|unique:users,nik',
        'username' => 'required|min:3|max:255',
        'tgl_lahir' => 'required',
        'umur' => '',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:3|max:255'
       ]);

       $validatedData['password'] = bcrypt($validatedData['password']);

       User::create($validatedData);

       return redirect('/login')->with('sukses', 'Registrasi Sukses!');
    }
}
