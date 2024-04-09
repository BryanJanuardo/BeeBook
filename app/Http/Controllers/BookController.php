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
        return view('AddBook', ['genres' => $genres]);
    }

    public function editIndex($ISBN)
    {
        $genres = Genre::all();
        $book = Book::where('ISBN','=',$ISBN)->firstOrFail();

        return view ('EditBook', [
            'genres' => $genres,
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

    public function detailBook($ISBN)
    {
        $book = Book::findOrFail($ISBN);
        return view('DetailBook', ['book' => $book]);
    }

    public function addBook(Request $request)
    {
        Book::create($request->all());
        return redirect()->route('Admin Dashboard');
    }
}
