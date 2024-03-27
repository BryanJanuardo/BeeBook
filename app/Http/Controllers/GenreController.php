<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        return view('AddGenre');
     }

    public function NewGenre(Request $request){
        $store = $request->validate([
            'GenreName' => 'required'
        ]);

        Genre::create($store);
        return 'Input Success';
    }
}
