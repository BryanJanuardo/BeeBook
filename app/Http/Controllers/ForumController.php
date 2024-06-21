<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller
{
    public function index()
    {
        $getAllPost = Post::get();
        $getAllUser = [];

        foreach ($getAllPost as $post) {
            $getAllUser[$post->user_id] = User::where('id', $post->user_id)->first();
        }

        return view('Forum', compact('getAllPost', 'getAllUser'));
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
