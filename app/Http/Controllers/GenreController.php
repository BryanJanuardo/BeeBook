<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function index(){
        return view('AddGenre');
    }

    public function editIndex()
    {
        return view ('EditGenre');
    }

    public function createGenre(Request $request)
     {
        $latestGenre = DB::table('genres')->orderBy('id', 'desc')->first();
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

    public function deleteIndex($id) {

        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect ('Edit Book');

    }
}
