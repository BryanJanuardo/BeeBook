<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function filter(Request $request){
        $query = $request->input('searchquery', '');
        $genresQuery = $request->input('genresearchlist', []);
        $user = Auth::user();

        $wishlists =  Wishlist::where('UserId', $user->id)
        ->whereHas('book', function ($queryBuilder) use ($query, $genresQuery) {
            if (!empty($query)) {
                $queryBuilder->where('BookTitle', 'like', '%' . $query . '%');
            }
            if (!empty($genresQuery)) {
                $queryBuilder->whereHas('genres', function ($q) use ($genresQuery) {
                    $q->whereIn('id', $genresQuery);
                });
            }
        })
        ->get();

        $getAllGenre = Genre::all();
        return view('Wishlist')->with(['wishlists' => $wishlists, 'genres' => $getAllGenre]);
    }

    public function index(){
        $user = Auth::user();
        $wishlists = Wishlist::where('UserId', $user->id)->get();
        $genres = Genre::all();

        return view('Wishlist', compact('wishlists', 'genres'));
    }

    public function delete($ISBN){
        $user = Auth::user();
        Wishlist::where('ISBN', $ISBN)->where('UserId', $user->id)->delete();

        return redirect()->route('Read List');
    }
}
