<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        private function attachGenre(Book $book){
            $genreList = ['Horror', 'Fantasy', 'Action', 'Comedy'];
            for ($i = 0; $i < 2; $i++) {
                do {
                    $genre = Genre::where('GenreName', '=', $genreList[rand(0, 3)])->firstOrFail();
                } while($book->genres()->where('genre_id', $genre->id)->exists());
                $book->genres()->attach($genre);
            }
        }
    public function run(): void
    {
        $book = Book::create([
            'ISBN' => '9781234567891',
            'PublisherName' => 'HarperCollins',
            'AuthorName' => 'Jane Smith',
            'PublishDate' => '2023-11-12',
            'BookTitle' => 'Learning Laravel',
            'BookPrice' => '25.99',
            'BookPage' => '400',
            'BookPicture' => 'laravel.jpg',
            'BookFile' => 'learning_laravel.pdf'
        ]);
        $this->attachGenre($book);

        $book = Book::create([
            'ISBN' => '9781234567892',
            'PublisherName' => 'Simon & Schuster',
            'AuthorName' => 'Michael Brown',
            'PublishDate' => '2022-07-21',
            'BookTitle' => 'Mastering PHP',
            'BookPrice' => '29.99',
            'BookPage' => '500',
            'BookPicture' => 'php.jpg',
            'BookFile' => 'mastering_php.pdf'
        ]);
        $this->attachGenre($book);

        $book = Book::create([
            'ISBN' => '9781234567893',
            'PublisherName' => 'Macmillan',
            'AuthorName' => 'Sarah Johnson',
            'PublishDate' => '2024-02-15',
            'BookTitle' => 'Introduction to AI',
            'BookPrice' => '34.99',
            'BookPage' => '320',
            'BookPicture' => 'ai.jpg',
            'BookFile' => 'introduction_to_ai.pdf'
        ]);
        $this->attachGenre($book);

        $book = Book::create([
            'ISBN' => '9781234567894',
            'PublisherName' => 'Hachette Book Group',
            'AuthorName' => 'Chris Lee',
            'PublishDate' => '2021-09-30',
            'BookTitle' => 'Web Development with JavaScript',
            'BookPrice' => '22.99',
            'BookPage' => '350',
            'BookPicture' => 'javascript.jpg',
            'BookFile' => 'web_dev_js.pdf'
        ]);
        $this->attachGenre($book);

        $book = Book::create([
            'ISBN' => '9781234567895',
            'PublisherName' => 'Penguin Random House',
            'AuthorName' => 'Emily Davis',
            'PublishDate' => '2020-05-10',
            'BookTitle' => 'Data Science Essentials',
            'BookPrice' => '27.99',
            'BookPage' => '480',
            'BookPicture' => 'data_science.jpg',
            'BookFile' => 'data_science_essentials.pdf'
        ]);
        $this->attachGenre($book);

        $book = Book::create([
            'ISBN' => '9781234567896',
            'PublisherName' => 'HarperCollins',
            'AuthorName' => 'David Clark',
            'PublishDate' => '2023-03-18',
            'BookTitle' => 'Cloud Computing',
            'BookPrice' => '31.99',
            'BookPage' => '410',
            'BookPicture' => 'cloud_computing.jpg',
            'BookFile' => 'cloud_computing.pdf'
        ]);
        $this->attachGenre($book);

        $book = Book::create([
            'ISBN' => '9781234567897',
            'PublisherName' => 'Simon & Schuster',
            'AuthorName' => 'Laura Martinez',
            'PublishDate' => '2024-08-25',
            'BookTitle' => 'Big Data Analytics',
            'BookPrice' => '39.99',
            'BookPage' => '530',
            'BookPicture' => 'big_data.jpg',
            'BookFile' => 'big_data_analytics.pdf'
        ]);
        $this->attachGenre($book);

        $book = Book::create([
            'ISBN' => '9781234567898',
            'PublisherName' => 'Macmillan',
            'AuthorName' => 'James Wilson',
            'PublishDate' => '2022-12-05',
            'BookTitle' => 'Machine Learning',
            'BookPrice' => '45.99',
            'BookPage' => '620',
            'BookPicture' => 'machine_learning.jpg',
            'BookFile' => 'machine_learning.pdf'
        ]);
        $this->attachGenre($book);

        $book = Book::create([
            'ISBN' => '9781234567899',
            'PublisherName' => 'Hachette Book Group',
            'AuthorName' => 'Sophia Lee',
            'PublishDate' => '2021-01-22',
            'BookTitle' => 'Deep Learning with Python',
            'BookPrice' => '49.99',
            'BookPage' => '700',
            'BookPicture' => 'deep_learning.jpg',
            'BookFile' => 'deep_learning_python.pdf'
        ]);
        $this->attachGenre($book);

        $book = Book::create([
            'ISBN' => '9781234567900',
            'PublisherName' => 'Penguin Random House',
            'AuthorName' => 'Robert Miller',
            'PublishDate' => '2024-10-13',
            'BookTitle' => 'Advanced Algorithms',
            'BookPrice' => '54.99',
            'BookPage' => '800',
            'BookPicture' => 'algorithms.jpg',
            'BookFile' => 'advanced_algorithms.pdf'
        ]);
        $this->attachGenre($book);
    }
}
