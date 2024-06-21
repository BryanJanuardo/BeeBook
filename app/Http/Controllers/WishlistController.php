<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addWishlist($ISBN, $UserId){
        if(Wishlist::where('ISBN', $ISBN)->where('UserId', $UserId)->exists()){
            return redirect()->route('Dashboard');
        }

        Wishlist::create([
            'ISBN' => $ISBN,
            'UserId' => $UserId
        ]);

        return redirect()->route('Dashboard');
    }

    public function index(){
        $user = Auth::user();
        $wishlists = Wishlist::where('UserId', $user->id)->get();

        return view('Wishlist', compact('wishlists'));
    }

    public function delete($ISBN){
        $user = Auth::user();
        Wishlist::where('ISBN', $ISBN)->where('UserId', $user->id)->delete();

        return redirect()->route('Read List');
    }
}
