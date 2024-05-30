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
        $book = Book::where('ISBN','=',$ISBN)->firstOrFail();
        $genreList = $book->genres()->pluck('GenreName')->toArray();

        return view ('EditBook', [
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
        $url = Storage::url('Book/BookFile/'.$book->BookFile);
        return view('ShowBook')->with('filePath', $url)->with('book', $book);
    }

    private function attachAllGenre($book, $genreList){
        foreach($genreList as $genre){
            $genre = Genre::where('GenreName', '=', $genre)->firstOrFail();
            $book->genres()->attach($genre);
        }
    }

    private function getLatestBook(){
        $latestBook = DB::table('books')->orderBy('ISBN', 'desc')->first();
        $latestBookISBN = '';

        if($latestBook == null){
            $latestBookISBN = '0000000000001';
        }else{
            $latestBookISBN = $latestBook->ISBN;
            $latestBookISBN = str_pad((int)$latestBookISBN + 1, 13, '0', STR_PAD_LEFT);
        }

        return $latestBookISBN;
    }

    public function addBook(Request $request)
    {
        if(Book::where('ISBN', '=', $request->BookISBN)->exists()){
            return redirect()->route('Add Book');
        }

        $extension = $request->file('BookPicture')->getClientOriginalExtension();
        $BookPicture = $request->BookTitle.'.'.$extension;
        $request->file('BookPicture')->storeAs('./storage/Book/BookPicture', $BookPicture);

        $extension = $request->file('BookFile')->getClientOriginalExtension();
        $BookFile = $request->BookTitle.'.'.$extension;
        $request->file('BookFile')->storeAs('./storage/Book/BookFile', $BookFile);

        $book = Book::create([
            'ISBN' => $request->BookISBN,
            'PublisherName' => $request->PublisherName,
            'AuthorName' => $request->AuthorName,
            'PublishDate' => $request->PublishDate,
            'BookTitle' => $request->BookTitle,
            'BookPrice' => $request->BookPrice,
            'BookPage' => $request->BookPage,
            'BookPicture' => $BookPicture,
            'BookFile' => $BookFile
        ]);

        $this->attachAllGenre($book, $request->genrelist);

        return redirect()->route('Admin Dashboard');
    }

    public function updateBook(Request $request, Book $book){
        $validatedData = $request->validate([
            'BookTitle' => 'required|max:255',
            'AuthorName' => 'required'
        ]);

        if(Book::where('ISBN', '=', $request->BookISBN)->exists()){
            return redirect()->route('Add Book');
        }

        $extension = $request->file('BookPicture')->getClientOriginalExtension();
        $BookPicture = $request->BookTitle.'.'.$extension;
        $request->file('BookPicture')->storeAs('./storage/Book/BookPicture', $BookPicture);

        $extension = $request->file('BookFile')->getClientOriginalExtension();
        $BookFile = $request->BookTitle.'.'.$extension;
        $request->file('BookFile')->storeAs('./storage/Book/BookFile', $BookPicture);

        $book = Book::where('ISBN', '=', $request->ISBN)->firstOrFail();
        $book->genres()->detach();
        $this->attachAllGenre($book, $request->genrelist);

        $book->ISBN = $request->BookISBN;
        $book->BookTitle = $request->BookTitle;
        $book->PublisherName = $request->PublisherName;
        $book->AuthorName = $request->AuthorName;
        $book->PublishDate = $request->PublishDate;
        $book->BookPrice = $request->BookPrice;
        $book->BookPage = $request->BookPage;
        $book->BookPicture = $BookPicture;
        $book->BookFile = $BookFile;

        $book->save();

        return back();
    }

    public function deleteBook($ISBN){
        $book = Book::where('ISBN', '=', $ISBN)->firstOrFail();
        $book->delete();
        return redirect()->route('Admin Dashboard');
    }
}
