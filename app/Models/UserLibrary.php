<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLibrary extends Model
{
    use HasFactory;

    protected $fillable = [
        'ISBN',
        'UserID',
        'ReadProgress'
    ];

    public function users(){
        return $this->hasOne(User::class, 'UserId');
    }

    public function books(){
        return $this->hasOne(Book::class, 'ISBN');
    }
}
