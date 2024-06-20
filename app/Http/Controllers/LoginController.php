<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('Login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'Email' => 'required|email:dns',
            'Password' => 'required'
        ]);

        $user = User::where('email', $credentials['Email'])->first();

        if($user == null){
            return back()->with('loginFailed', 'Login Failed!');
        }

        if(Hash::check($credentials['Password'], $user->password)){
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('Dashboard');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('Login');
    }
}
