<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $primaryKey = 'ForumId';
    public $incrementing = true;
    protected $keyType = 'integer';

    protected $fillable = [
        'Topic',
        'Subject'
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'UserId');
    }
}
