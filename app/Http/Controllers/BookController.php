<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('AddBook')->with('genres', $genres);
    }

    public function editIndex()
    {
        return view ('EditBook');
    }

    public function detailBook($ISBN)
    {
        $book = Book::where('ISBN', $ISBN)->firstOrFail();
        return view('DetailBook')->with('book', $book);
    }

    public function addBook(Request $request)
    {
        Book::create($request->all());
        return redirect()->route('Admin Dashboard');
    }
}
