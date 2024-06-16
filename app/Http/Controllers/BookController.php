<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $book = Book::where('ISBN', '=', $ISBN)->firstOrFail();
        $genreList = $book->genres()->pluck('GenreName')->toArray();

        return view('EditBook', [
            'genres' => $genres,
            'book' => $book,
            'ISBN' => $ISBN,
            'genreList' => $genreList
        ]);
    }

    public function detailIndex($ISBN)
    {
        $book = Book::findOrFail($ISBN);
        return view('DetailBook', ['book' => $book]);
    }

    public function showBook($ISBN)
    {
        $book = Book::findOrFail($ISBN);
        $url = Storage::url('Book/BookFile/' . $book->BookFile);
        return view('ShowBook')->with('filePath', $url)->with('book', $book);
    }

    private function attachAllGenre($book, $genreList)
    {
        foreach ($genreList as $genre) {
            $genre = Genre::where('GenreName', '=', $genre)->firstOrFail();
            $book->genres()->attach($genre);
        }
    }

    private function getLatestBook()
    {
        $latestBook = DB::table('books')->orderBy('ISBN', 'desc')->first();
        $latestBookISBN = '';

        if ($latestBook == null) {
            $latestBookISBN = '0000000000001';
        } else {
            $latestBookISBN = $latestBook->ISBN;
            $latestBookISBN = str_pad((int) $latestBookISBN + 1, 13, '0', STR_PAD_LEFT);
        }

        return $latestBookISBN;
    }

    public function addBook(Request $request)
    {
        if (Book::where('ISBN', '=', $request->BookISBN)->exists()) {
            return redirect()->route('Add Book');
        }

        $extension = $request->file('BookPicture')->getClientOriginalExtension();
        $BookPicture = $request->BookTitle . '.' . $extension;
        $request->file('BookPicture')->storeAs('./storage/Book/BookPicture', $BookPicture);

        $extension = $request->file('BookFile')->getClientOriginalExtension();
        $BookFile = $request->BookTitle . '.' . $extension;
        $request->file('BookFile')->storeAs('./storage/Book/BookFile', $BookFile);

        // tambah validasi buat insert --> insert + validasi
        $book = Book::create([
            'ISBN' => 'required|string|unique:books',
            'PublisherName' => 'required|string',
            'AuthorName' => 'required|string',
            'PublishDate' => 'required|date',
            'BookTitle' => 'required|string',
            'BookPrice' => 'required|numeric',
            'BookPage' => 'required|integer',
            'BookFile' => 'nullable|file|mimes:pdf,doc,docx',
            'BookPicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $this->attachAllGenre($book, $request->genrelist);

        return redirect()->route('Admin Dashboard');
    }

    // tambah validasi buat update --> update + validasi
    public function updateBook(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'BookTitle' => 'required|max:255',
            'PublisherName' => 'required|string',
            'AuthorName' => 'required|string',
            'PublishDate' => 'required|date',
            'BookPrice' => 'required|numeric',
            'BookPage' => 'required|integer',
            'BookFile' => 'nullable|file|mimes:pdf,doc,docx',
            'BookPicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if (Book::where('ISBN', '=', $request->BookISBN)->exists()) {
            return redirect()->route('Add Book');
        }

        if ($request->hasFile('BookPicture')) {
            $extension = $request->file('BookPicture')->getClientOriginalExtension();
            $BookPicture = $validatedData['BookTitle'] . '.' . $extension;
            $request->file('BookPicture')->storeAs('public/Book/BookPicture', $BookPicture);
            $validatedData['BookPicture'] = $BookPicture;
        }
    
        if ($request->hasFile('BookFile')) {
            $extension = $request->file('BookFile')->getClientOriginalExtension();
            $BookFile = $validatedData['BookTitle'] . '.' . $extension;
            $request->file('BookFile')->storeAs('public/Book/BookFile', $BookFile);
            $validatedData['BookFile'] = $BookFile;
        }

        $book = Book::where('ISBN', '=', $request->ISBN)->firstOrFail();
        $book->genres()->detach();
        $this->attachAllGenre($book, $request->genrelist);

        $book->update($validatedData);

        return back();
    }

    public function deleteBook($ISBN)
    {
        $book = Book::where('ISBN', '=', $ISBN)->firstOrFail();
        $book->delete();
        return redirect()->route('Admin Dashboard');
    }
}
