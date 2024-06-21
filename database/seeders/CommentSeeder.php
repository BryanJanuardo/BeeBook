<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create([
            'post_id' => 1,
            'user_id' => 2,
            'body' => 'Yea, i think this book is very good',
            'like' => 20
        ]);

        Comment::create([
            'post_id' => 2,
            'user_id' => 3,
            'body' => 'Yea, i think this book is very good',
            'like' => 20
        ]);

        Comment::create([
            'post_id' => 3,
            'user_id' => 4,
            'body' => 'Yea, i think this book is very good',
            'like' => 20
        ]);

        Comment::create([
            'post_id' => 4,
            'user_id' => 5,
            'body' => 'Yea, i think this book is very good',
            'like' => 20
        ]);
    }
}
