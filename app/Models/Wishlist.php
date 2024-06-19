<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'ISBN',
        'UserId'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'ISBN', 'ISBN');
    }
}
