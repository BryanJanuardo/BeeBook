<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $feedbacks = FeedbackController::getAllFeedbackWithISBN($ISBN);

        return view('DetailBook', [
            'book' => $book,
            'feedbacks' => $feedbacks
        ]);
    }

    public function showBook($ISBN, $page)
    {
        $book = Book::findOrFail($ISBN);
        $url = Storage::url('Book/BookFile/' . $book->BookFile);
        $user = Auth::user();

        if($user) $page = UserLibraryController::getPageByUserId($user->userID);

        return view('ShowBook')->with([
            'filePath' => $url,
            'book' => $book,
            'page' => $page
        ]);
    }

    public function incrementPage($ISBN, $page){
        $book = Book::findOrFail($ISBN);
        $user = Auth::user();
        if($user) UserLibraryController::updateBookProgress($ISBN, $page + 1);

        return redirect()->route('Show Book', ['ISBN' => $ISBN, 'page' => $page + 1]);
    }

    public function decrementPage($ISBN, $page){
        $book = Book::findOrFail($ISBN);
        $user = Auth::user();
        if($user) UserLibraryController::updateBookProgress($ISBN, $page);

        return redirect()->route('Show Book', ['ISBN' => $ISBN, 'page' => $page - 1]);
    }

    private function attachAllGenre($book, $genreList)
    {
        foreach ($genreList as $genre) {
            $genre = Genre::where('GenreName', '=', $genre)->firstOrFail();
            $book->genres()->attach($genre);
        }
    }

    public function addBook(Request $request)
    {
        if (Book::where('ISBN', '=', $request->BookISBN)->exists()) {
            return redirect()->route('Add Book');
        }

        $request->validate([
            'ISBN' => 'required|string|unique:books',
            'PublisherName' => 'required|string',
            'AuthorName' => 'required|string',
            'PublishDate' => 'required|date',
            'BookTitle' => 'required|string',
            'BookPrice' => 'required|numeric',
            'BookPage' => 'required|integer',
            'BookFile' => 'nullable|file|mimes:pdf,doc,docx',
            'BookPicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genrelist' => 'required|array|min:1'
        ]);

        $extension = $request->file('BookPicture')->getClientOriginalExtension();
        $BookPicture = $request->BookTitle . '.' . $extension;
        $request->file('BookPicture')->storeAs('./storage/Book/BookPicture', $BookPicture);

        $extension = $request->file('BookFile')->getClientOriginalExtension();
        $BookFile = $request->BookTitle . '.' . $extension;
        $request->file('BookFile')->storeAs('./storage/Book/BookFile', $BookFile);

        // tambah validasi buat insert --> insert + validasi
        $book = Book::create([
            'ISBN' => $request->ISBN,
            'PublisherName' => $request->PublisherName,
            'AuthorName' => $request->AuthorName,
            'PublishDate' => $request->PublishDate,
            'BookTitle' => $request->BookTitle,
            'BookPrice' => $request->BookPrice,
            'BookPage' => $request->BookPage,
            'BookFile' => $BookFile,
            'BookPicture' => $BookPicture
        ]);

        $this->attachAllGenre($book, $request->genrelist);

        return redirect()->route('Admin Dashboard');
    }

    // tambah validasi buat update --> update + validasi
    public function updateBook(Request $request, Book $book)
    {
        if (Book::where('ISBN', '=', $request->BookISBN)->exists()) {
            return redirect()->route('Add Book');
        }

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
        $book->save();
        return back();
    }

    public function deleteBook($ISBN)
    {
        $book = Book::where('ISBN', '=', $ISBN)->firstOrFail();
        $book->delete();
        return redirect()->route('Admin Dashboard');
    }
}
