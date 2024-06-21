<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public static function getAllCommentByPostId($id){
        $comments = Comment::where('post_id', $id)->with('user')->get();
        return $comments;
    }

    public function createComment(Request $request, $post_id){
        $user = Auth::user();

        if($user == null){
            return redirect()->route('Show Post', ['post_id' => $post_id]);
        }

        Comment::create([
            'post_id' => $post_id,
            'user_id' => $user->id,
            'body' => $request->Body,
            'like' => 0
        ]);

        return redirect()->route('Show Post', ['post_id' => $post_id]);
    }
}
