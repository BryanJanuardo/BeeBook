<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostVote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostVoteController extends Controller
{
    public function likePost($post_id){
        $user = Auth::user();
        $post = Post::find($post_id);

        $isLiked = PostVote::where('post_id', $post->id)->where('user_id', $user->id)->first();
        if(!is_null($isLiked)){
            if($isLiked->like === 1){
                $isLiked->update(['like' => 0]);
                $post->increment('like', -1);
                return back();
            }else{
                $isLiked->update(['like' => 1]);
                $post->increment('like', 1);
                return back();
            }
        }
        else{
            PostVote::create([
                'post_id' => $post->id,
                'user_id' => $user->id,
                'like' => 1
            ]);
            $post->increment('like', 1);
            return back();
        }
    }
}
