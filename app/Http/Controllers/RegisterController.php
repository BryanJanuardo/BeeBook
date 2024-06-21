<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $user = User::create([
            'name' => $credentials['Username'],
            'email' => $credentials['Email'],
            'password' => Hash::make($credentials['Password']),
            'BookRedemptionPoints' => 0
        ]);

        if(Auth::attempt(['email' => $credentials['Email'], 'password' => $request->Password])){
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('Dashboard');

        }
        return back()->with('registerFailed', 'Register Failed!');
    }
}
