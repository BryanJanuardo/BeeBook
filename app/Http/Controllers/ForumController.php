<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller
{
    public function index()
    {
        $getAllPost = Post::get();

        return view('Forum', compact('getAllPost'));
    }

    public function filter(Request $request)
    {
        $query = $request->input('searchquery', '');
        $getAllPost = Post::where('title', 'LIKE', '%' . $query . '%')->get();
        return view('Forum', compact('getAllPost'));
    }

    public function showPost($post_id){
        $post = Post::findOrFail($post_id);
        $comments = CommentController::getAllCommentByPostId($post_id);

        return view('DetailPost', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function addPost(Request $request)
    {
        if (Post::where('post_id', '=', $request->post_id)->exists()) {
            return redirect()->route('Create Post');
        }

        $request->validate([
            'post_id' => 'required|string|unique:posts',
            'user_id' => 'integer',
            'title' => 'required|string',
            'body' => 'required|string',
            'reply' => 'required|string',
        ]);

        // tambah validasi buat insert --> insert + validasi
        $Post = Post::create([]);

        return redirect()->route('Admin Dashboard');
    }
}
