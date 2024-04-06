<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        return view('AddGenre');
    }

    public function editIndex()
    {
        return view ('EditGenre');
    }

    public function deleteIndex($id) {

        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect ('Edit Book');

    }
}
