<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestTracker extends Model
{
    use HasFactory;

    protected $fillable = [
        'QuestCompletedDate',
        'QuestAvailable',
        'UserID',
        'QuestProgress'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'UserID');
    }
}
