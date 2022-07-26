<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\HomePage;

class WelcomeController extends Controller
{
    public function index()
    {
        $welcomesection = HomePage::where('id', 1)->first();
        $youtubesection = HomePage::where('id', 2)->first();
        return view('welcome', compact('welcomesection', 'youtubesection'));
    }

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
}
