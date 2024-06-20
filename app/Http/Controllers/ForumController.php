<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        return view('Forum');
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
        $Post = Post::create([


        ]);

        return redirect()->route('Admin Dashboard');
    }

}
