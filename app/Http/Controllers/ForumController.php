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
<<<<<<< HEAD
        $getAllUser = [];
=======
>>>>>>> 1f943ed962818604c28a39c2d788e2efde9c8300

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

    public function createPost(){
        return view('AddForum');
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
            'like' => 'required|integer|min:0',
        ]);

        // tambah validasi buat insert --> insert + validasi
        $Post = Post::create([
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
            'title' => $request->title,
            'body' => $request->body,
            'like' => $request->like,
        ]);

        return redirect()->route('Dashboard');
    }

    public function editPost(Request $request){


    }

    public function deletePost(Request $request){

    }
}
