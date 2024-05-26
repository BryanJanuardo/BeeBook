<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Feedback extends Model
{
    use HasFactory;

    protected $primaryKey = 'FeedbackId';
    public $incrementing = true;
    protected $keyType = 'integer';

    protected $fillable = [
        'UserId',
        'ISBN',
        'Subject',
        'Rating'
    ];

    public function Feedback(): HasOne
    {
        return $this->hasOne(User::class, 'UserId');
        return $this->hasOne(Book::class, 'ISBN');
    }
}
