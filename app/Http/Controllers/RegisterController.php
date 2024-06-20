<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view('Register');
    }

    public function register(Request $request){
        $credentials = $request->validate([
            'Username' => 'required|min:5|max:20',
            'Email' => 'required|email:dns',
            'Password' => 'required|min:5|max:40'
        ]);

        $credentials['Password'] = bcrypt($credentials['Password']);

        User::create([
            ''
        ])

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('Dashboard');

            return back()->with('loginFailed', 'Login Failed!');
        }
    }
}
