<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'like'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function like()
    {
        return $this->hasMany(PostVote::class, 'post_vote_id');
    }
}
