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

    public function editIndex($id){
        $genre = Genre::findOrFail($id);
        return view ('EditGenre')->with('genre', $genre);
    }

    public function createGenre(Request $request)
    {
        $validatedData = $request->validate([
            'GenreName' => 'required|string',
        ]);

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
            'GenreName' => $validatedData['GenreName'],
        ]);

        return redirect()->route('Add Book');
    }

    public function editGenre(Request $request, $id){
        $validatedData = $request->validate([
            'GenreName' => 'required|string',
        ]);

        $genre = Genre::findOrFail($id);

        $genre->update($validatedData);

        return redirect()->route('Add Book');
    }

    public function deleteGenre($id) {

        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->back();
    }

}


