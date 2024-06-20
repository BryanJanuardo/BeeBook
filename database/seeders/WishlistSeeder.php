<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\User;
use App\Models\Wishlist;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ensure a user with id = 1 exists
        User::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'Test User',
                'email' => 'testuser@example.com',
                'password' => bcrypt('password')
            ]
        );

        // Create some books manually with unique ISBN values
        $books = [
            [
                'ISBN' => '978-3-16-148410-0',
                'PublisherName' => 'Publisher 1',
                'AuthorName' => 'Author 1',
                'PublishDate' => '2021-01-01',
                'BookTitle' => 'Book 1',
                'BookPrice' => 2999,
                'BookPage' => 300,
                'BookPicture' => 'cover_image_1.jpg',
                'BookFile' => 'book_file_1.pdf'
            ],
            [
                'ISBN' => '978-3-16-148411-7',
                'PublisherName' => 'Publisher 2',
                'AuthorName' => 'Author 2',
                'PublishDate' => '2022-02-01',
                'BookTitle' => 'Book 2',
                'BookPrice' => 1999,
                'BookPage' => 200,
                'BookPicture' => 'cover_image_2.jpg',
                'BookFile' => 'book_file_2.pdf'
            ],
            [
                'ISBN' => '978-3-16-148412-4',
                'PublisherName' => 'Publisher 3',
                'AuthorName' => 'Author 3',
                'PublishDate' => '2023-03-01',
                'BookTitle' => 'Book 3',
                'BookPrice' => 3999,
                'BookPage' => 400,
                'BookPicture' => 'cover_image_3.jpg',
                'BookFile' => 'book_file_3.pdf'
            ],
            [
                'ISBN' => '978-3-16-148413-1',
                'PublisherName' => 'Publisher 4',
                'AuthorName' => 'Author 4',
                'PublishDate' => '2024-04-01',
                'BookTitle' => 'Book 4',
                'BookPrice' => 2499,
                'BookPage' => 250,
                'BookPicture' => 'cover_image_4.jpg',
                'BookFile' => 'book_file_4.pdf'
            ],
            [
                'ISBN' => '978-3-16-148414-8',
                'PublisherName' => 'Publisher 5',
                'AuthorName' => 'Author 5',
                'PublishDate' => '2025-05-01',
                'BookTitle' => 'Book 5',
                'BookPrice' => 1499,
                'BookPage' => 150,
                'BookPicture' => 'cover_image_5.jpg',
                'BookFile' => 'book_file_5.pdf'
            ],
            [
                'ISBN' => '978-3-16-148415-5',
                'PublisherName' => 'Publisher 6',
                'AuthorName' => 'Author 6',
                'PublishDate' => '2026-06-01',
                'BookTitle' => 'Book 6',
                'BookPrice' => 2599,
                'BookPage' => 275,
                'BookPicture' => 'cover_image_6.jpg',
                'BookFile' => 'book_file_6.pdf'
            ],
            [
                'ISBN' => '978-3-16-148416-2',
                'PublisherName' => 'Publisher 7',
                'AuthorName' => 'Author 7',
                'PublishDate' => '2027-07-01',
                'BookTitle' => 'Book 7',
                'BookPrice' => 1899,
                'BookPage' => 225,
                'BookPicture' => 'cover_image_7.jpg',
                'BookFile' => 'book_file_7.pdf'
            ],
            [
                'ISBN' => '978-3-16-148417-9',
                'PublisherName' => 'Publisher 8',
                'AuthorName' => 'Author 8',
                'PublishDate' => '2028-08-01',
                'BookTitle' => 'Book 8',
                'BookPrice' => 3399,
                'BookPage' => 320,
                'BookPicture' => 'cover_image_8.jpg',
                'BookFile' => 'book_file_8.pdf'
            ],
            [
                'ISBN' => '978-3-16-148418-6',
                'PublisherName' => 'Publisher 9',
                'AuthorName' => 'Author 9',
                'PublishDate' => '2029-09-01',
                'BookTitle' => 'Book 9',
                'BookPrice' => 2799,
                'BookPage' => 290,
                'BookPicture' => 'cover_image_9.jpg',
                'BookFile' => 'book_file_9.pdf'
            ],
            [
                'ISBN' => '978-3-16-148419-3',
                'PublisherName' => 'Publisher 10',
                'AuthorName' => 'Author 10',
                'PublishDate' => '2030-10-01',
                'BookTitle' => 'Book 10',
                'BookPrice' => 3199,
                'BookPage' => 310,
                'BookPicture' => 'cover_image_10.jpg',
                'BookFile' => 'book_file_10.pdf'
            ],
        ];

        foreach ($books as $bookData) {
            Book::updateOrCreate(['ISBN' => $bookData['ISBN']], $bookData);
        }

        // Assume you have a user with ID 1 already in the users table
        $userId = 1;

        // Create some wishlist items manually
        // $wishlistItems = [
        //     ['UserId' => $userId, 'ISBN' => '978-3-16-148410-0'],
        //     ['UserId' => $userId, 'ISBN' => '978-3-16-148411-7'],
        //     ['UserId' => $userId, 'ISBN' => '978-3-16-148412-4'],
        //     ['UserId' => $userId, 'ISBN' => '978-3-16-148413-1'],
        //     ['UserId' => $userId, 'ISBN' => '978-3-16-148414-8'],
        // ];

        // foreach ($wishlistItems as $item) {
        //     Wishlist::updateOrCreate(['UserId' => $item['UserId'], 'ISBN' => $item['ISBN']], $item);
        // }
        foreach ($books as $bookData) {
            Wishlist::updateOrCreate(['UserId' => $userId, 'ISBN' => $bookData['ISBN']]);
        }
    }
}
