<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentVote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentVoteController extends Controller
{
    public function likeComment($comment_id){
        $user = Auth::user();
        $comment = Comment::find($comment_id);

        $isLiked = CommentVote::where('comment_id', $comment->id)->where('user_id', $user->id)->first();
        if(!is_null($isLiked)){
            if($isLiked->like === 1){
                $isLiked->update(['like' => 0]);
                $comment->increment('like', -1);
                return back();
            }else{
                $isLiked->update(['like' => 1]);
                $comment->increment('like', 1);
                return back();
            }
        }
        else{
            CommentVote::create([
                'comment_id' => $comment->id,
                'user_id' => $user->id,
                'like' => 1
            ]);
            $comment->increment('like', 1);
            return back();
        }
    }

}
