<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('AddBook');
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
