<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLibrary extends Model
{
    use HasFactory;

    protected $table = 'userlibrary';

    protected $fillable = [
        'ISBN',
        'UserID',
        'ReadProgress'
    ];

    public function book(){
        return $this->belongsTo(Book::class, 'ISBN');
    }

    public function user(){
        return $this->belongsTo(User::class, 'UserID');
    }
}
