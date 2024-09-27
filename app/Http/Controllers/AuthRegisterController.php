<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthRegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['min:3', 'max:255', 'required', 'unique:users'],
            'email' => ['email', 'required', 'unique:users'],
            'password' => ['min:5', 'required'],
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Register successful!');
    }
}
