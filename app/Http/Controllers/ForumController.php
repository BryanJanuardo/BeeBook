<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function createPost(){
        return view('AddForum');
    }

    public function Edit($post_id){
        $post = Post::findOrFail($post_id);

        return view('EditForum', ['post' => $post]);
    }

    public function addPost(Request $request)
    {
        if (Post::where('id', '=', $request->post_id)->exists()) {
            return redirect()->route('Create Post');
        }

        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);


        // tambah validasi buat insert --> insert + validasi
        $Post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'body' => $request->body,
            'like' => 0
        ]);

        return redirect()->route('Forum');
    }

    public function editPost(Request $request, $post_id){
        $post = Post::findOrFail($post_id);

        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        // if($post->user_id !== Auth::user()->id){
        //     return redirect()->route('Forum');
        // }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('Forum');
    }

    public function deletePost($post_id){
        $post = Post::findOrFail($post_id);

        // if($post->user_id !== Auth::user()->id){
        //     return redirect()->route('Forum');
        // }

        $post->delete();
        return redirect()->route('Forum');
    }
}
