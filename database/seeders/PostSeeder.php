<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'user_id' => 1,
            'title' => 'This book very good',
            'body' => 'This book is very very good i think, i wonder what do you guys think about this book',
            'like' => 100
        ]);

        Post::create([
            'user_id' => 2,
            'title' => 'I cannot open the reader',
            'body' => 'For some reason i cannot open the reader, can someone help?',
            'like' => 500
        ]);

        Post::create([
            'user_id' => 3,
            'title' => 'What do you guys think about the new redemption feature?',
            'body' => 'I think it is great, i am very happy, i am very happy, i am very happy',
            'like' => 1000
        ]);

        Post::create([
            'user_id' => 4,
            'title' => 'This is a placeholder message',
            'body' => 'This is a placeholder body',
            'like' => 1750
        ]);

        Post::create([
            'user_id' => 5,
            'title' => 'This is a placeholder message',
            'body' => 'This is a placeholder body',
            'like' => 200
        ]);

    }
}
