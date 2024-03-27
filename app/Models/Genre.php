<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory,HasUuids;
    //Take input from AddGenre
    protected $table = 'AddGenre';
    protected $fillable = ['GenreName'];
    public $timestamps = false;

    // Generate UID
    protected $primaryKey = 'GenreId';
    public $incrementing = false;
    protected $keyType = 'string';
}
