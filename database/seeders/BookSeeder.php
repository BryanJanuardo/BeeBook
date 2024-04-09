<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'ISBN' => '0003230001',
            'BookTitle' => 'The Hobbit',
            'PublisherName' => 'Hobbit Press',
            'AuthorName' => 'J.R.R. Tolkien',
            'AuthorAddress' => 'Shire',
            'PublishDate' => '1999-01-01',
            'BookGenre' => 'Fantasy',
            'BookPage' => 12,
            'BookPicture' => '',
        ]);

        Book::create([
            'ISBN' => '00630000001',
            'BookTitle' => 'The Lord of the Rings',
            'PublisherName' => 'Hobbit Press',
            'AuthorName' => 'J.R.R. Tolkien',
            'AuthorAddress' => 'Shire',
            'PublishDate' => '1999-01-01',
            'BookGenre' => 'Fantasy',
            'BookPage' => 12,
            'BookPicture' => '',
        ]);

        Book::create([
            'ISBN' => '00092023001',
            'BookTitle' => 'Psychology of Money',
            'PublisherName' => 'Morgan Housel',
            'AuthorName' => 'J.R.R. Tolkien',
            'AuthorAddress' => 'Shire',
            'PublishDate' => '1999-01-01',
            'BookGenre' => 'Horror',
            'BookPage' => 22,
            'BookPicture' => '',
        ]);
    }
}
