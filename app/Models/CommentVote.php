<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentVote extends Model
{
    public $table = "commentvote";
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';

    protected $fillable = [
        'user_id',
        'comment_id',
        'like'

    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment(){
        return $this->belongsTo(Comment::class, 'comment_id');
    }
}
