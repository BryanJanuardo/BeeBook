<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'FeedbackId';
    public $incrementing = true;
    protected $keyType = 'integer';

    protected $fillable = [
        'user_id',
        'post_id',
        'body',
        'like'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
