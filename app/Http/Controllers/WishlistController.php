<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function addWishlist($ISBN, $UserId){
        Wishlist::create([
            'ISBN' => $ISBN,
            'UserId' => $UserId
        ]);

        return redirect()->route('Dashboard');
    }
}
