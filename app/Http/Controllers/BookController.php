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

    public function editIndex($ISBN)
    {
        return view ('EditBook', [
            $book = Book::where('ISBN','=',$ISBN)->firstOrFail(),
            'book' => $book,
            'ISBN' => $ISBN
        ]);
    }

    public function update(Request $request, Book $book){
        $validatedData = $request->validate([
            'BookTitle' => 'required|max:255',
            'AuthorName' => 'required'
        ]);

        $book = Book::where('ISBN', '=', $request->ISBN)->firstOrFail();
        $book->BookTitle = $request->BookTitle;
        $book->PublisherName = $request->PublisherName;
        $book->AuthorName = $request->AuthorName;
        $book->AuthorAddress = $request->AuthorAddress;
        $book->PublishDate = $request->PublishDate;
        $book->BookGenre = $request->BookGenre;
        $book->BookPrice = $request->BookPrice;
        $book->BookPage = $request->BookPage;
        $book->BookPicture = $request->BookPicture;
        $book->save();

        return back();
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
