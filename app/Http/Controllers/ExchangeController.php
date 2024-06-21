<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExchangeController extends Controller
{
    public function index()
    {
        return view('PointExchange');
    }

    public function exchange($point)
    {
        $user = User::where('id', Auth::user()->id)->first();

        if($user->BookRedemptionPoints >= $point){
            $user->update([
                'BookRedemptionPoints' => $user->BookRedemptionPoints - $point,
            ]);
        }
        return redirect()->route('PointExchange');
    }
}
