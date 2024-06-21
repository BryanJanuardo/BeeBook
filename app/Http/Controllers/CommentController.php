<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public static function getAllCommentByPostId($id){
        $comments = Comment::where('post_id', $id)->with('user')->get();
        return $comments;
    }
}
