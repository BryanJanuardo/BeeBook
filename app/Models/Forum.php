<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Feedback extends Model
{
    use HasFactory;

    protected $primaryKey = 'ForumId';
    public $incrementing = true;
    protected $keyType = 'integer';

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'like'
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'UserId');
    }
}
