<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'TransactionId',
        'ISBN',
        'UserId',
        'TransactionDate'
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'UserId');
    }

    public function books(){
        return $this->hasOne(Book::class, 'ISBN');
    }
}
