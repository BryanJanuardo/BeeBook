<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'ISBN';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'ISBN',
        'PublisherName',
        'AuthorName',
        'PublishDate',
        'BookTitle',
        'BookPrice',
        'BookPage',
        'BookPicture',
        'BookFile'
    ];

    public function Genre()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function Feedback()
    {
        return $this->hasMany(Feedback::class, 'ISBN');
    }
}
