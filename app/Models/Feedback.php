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

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    public function books()
    {
        return $this->belongsTo(Book::class, 'ISBN');
    }
}
