<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentVoteController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestTrackerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserLibraryController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PostVoteController;
use App\Http\Controllers\ReadProgressController;
use App\Models\Book;
use App\Models\Comment;
use App\Models\UserLibrary;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [DashboardController::class, 'index'])->name('Dashboard');
Route::post('/FilterBook', [DashboardController::class, 'filter'])->name('Filter Book');
Route::get('/AboutUs', [AboutController::class, 'index'])->name('About Us');

Route::middleware('admin')->group(function () {
    Route::get('/AddBook', [BookController::class, 'index'])->name('Add Book');
    Route::post('/AddBook/post', [BookController::class, 'addBook'])->name('Post Book');

    Route::get('/EditBook/{ISBN}', [BookController::class, 'editIndex'])->name('Edit Book');
    Route::patch('/EditBook/{ISBN}/Post', [BookController::class, 'updateBook'])->name('Update Book');
    Route::delete('/DeleteBook/{ISBN}', [BookController::class, 'deleteBook'])->name('Delete Book');

    Route::get('/AddGenre', [GenreController::class, 'index'])->name('Add Genre');
    Route::post('/createGenre', [GenreController::class, 'createGenre'])->name('Create Genre');
    Route::get('/editGenre/{id}', [GenreController::class, 'editIndex'])->name('Edit Genre');
    Route::patch('/editGenre/{id}', [GenreController::class, 'editGenre'])->name('editGenre');
    Route::delete('/deleteGenre/{id}', [GenreController::class, 'deleteGenre'])->name('deleteGenre');
});

Route::middleware('user')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('Read List');
    Route::post('/filterwishlist', [WishlistController::class, 'filter'])->name('Filter Read List');
    Route::delete('/wishlist/{ISBN}', [WishlistController::class, 'delete'])->name('Delete Read List');
    Route::post('/Wishlist/{ISBN}/{UserId}/Post', [WishlistController::class, 'addWishlist'])->name('Store Read List');

    Route::get('/bookmark', [UserLibraryController::class, 'index'])->name('Book Mark');
    Route::post('/filterbookmark', [UserLibraryController::class, 'filter'])->name('Filter Book Mark');
    Route::delete('/bookmark/{ISBN}', [UserLibraryController::class, 'delete'])->name('Delete Book Mark');

    Route::post('/submit-feedback/{ISBN}', [FeedbackController::class, 'store']);

    Route::get('/Forum', [ForumController::class, 'index'])->name('Forum');
    Route::post('/FilterForum', [ForumController::class, 'filter'])->name('Filter Forum');
    Route::get('/Forum/{post_id}', [ForumController::class, 'showPost'])->name('Show Post');
    Route::post('/submit-comment/{post_id}', [CommentController::class, 'createComment']);
    Route::post('/like-post/{post_id}', [PostVoteController::class, 'likePost'])->name('Like Post');
    Route::get('/AddForum', [ForumController::class, 'createPost'])->name('Add Forum');
    Route::post('AddForum/post', [ForumController::class, 'addPost'])->name('Post Forum');

    Route::post('/edit-comment/{comment_id}', [CommentController::class, 'editComment']);
    Route::post('/delete-comment/{comment_id}', [CommentController::class, 'deleteComment'])->name('Delete Comment');
    Route::post('/like-comment/{comment_id}', [CommentVoteController::class, 'likeComment'])->name('Like Comment');

    Route::get('/PointExchange', [ExchangeController::class, 'index'])->name('PointExchange');

    Route::post('/Logout', [LoginController::class, 'logout'])->name('Logout');
});

Route::get('/ShowBook/{ISBN}/{page}', [BookController::class, 'showBook'])->name('Show Book');
Route::post('/ShowBook/{ISBN}/{page}/increment', [BookController::class, 'incrementPage'])->name('Increase Book Page');
Route::post('/ShowBook/{ISBN}/{page}/decrement', [BookController::class, 'decrementPage'])->name('Decrease Book Page');

Route::get('/DetailBook/{ISBN}', [BookController::class, 'detailIndex'])->name('Detail Book');


Route::middleware('guest')->group(function () {
    Route::get('/Login', [LoginController::class, 'index'])->name('Login');
    Route::post('/Login/post', [LoginController::class, 'authenticate'])->name('Authenticate');
    Route::get('/Register', [RegisterController::class, 'index'])->name('Register');
    Route::post('/Register/post', [RegisterController::class, 'register'])->name('Register User');
});
