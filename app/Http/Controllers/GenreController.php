<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        return view('AddGenre');
    }

    public function editIndex($id)
    {
        $genre = Genre::findOrFail($id);
        return view ('EditGenre')->with('genre', $genre);
    }

    public function createGenre(Request $request)
     {
        $latestGenre = Genre::latest()->first();
        $latestGenreId = '';

        if($latestGenre == null){
            $latestGenreId = 'GE-001';
        }else{
            $latestGenreId = substr($latestGenre->id, 3);
            $latestGenreId = 'GE-' . str_pad((int)$latestGenreId + 1, 3, '0', STR_PAD_LEFT);
        }

        Genre::create([
            'id' => $latestGenreId,
            'GenreName' => $request->GenreName
        ]);

         return redirect()->route('Add Book');
     }
}
