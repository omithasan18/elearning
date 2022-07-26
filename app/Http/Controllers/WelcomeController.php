<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function save_register(Request $request){
        $validatedData = $request->validate([
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
        ]);
        $customer = new User();
        $customer->name = $request->name;
        $customer->username = $request->username;
        $customer->email = $request->email;
        $customer->role_id = 2;
        $customer->password = bcrypt($request->password);
        $customer->save();
        return redirect('/login')->with('msg','Register Successfully ! Please Login Here');
    //
    }
    public function index()
    {
        return view('welcome',);
    }
}
