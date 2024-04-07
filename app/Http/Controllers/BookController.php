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

    public function editIndex($id)
    {
        $book = Book::find($id);
        return view ('EditBook', compact('book'));
    }

    public function update(Request $request, $id)
{
    $item = Book::find($id);
    $item->name = $request->input('name');
    $item->description = $request->input('description');

    $item->save();
    return redirect('/items')->with('success', 'Item updated successfully');
}

    public function detailBook($id)
    {
        return view('DetailBook');
    }

    public function addBook(Request $request)
    {
        Book::create($request->all());
        return redirect()->route('Admin Dashboard');
    }
}
