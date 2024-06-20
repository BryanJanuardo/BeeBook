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
        $getAllPost = DB::table('posts')->get();
        $getAllUser = [];

        foreach ($getAllPost as $post) {
            $getAllUser[$post->user_id] = User::where('id', $post->user_id)->first();
        }

        return view('Forum', compact('getAllPost', 'getAllUser'));
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
