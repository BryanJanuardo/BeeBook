<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use App\Models\Feedback;
use App\Models\User;

class FeedbackSeeder extends Seeder
{
    private static function randOneDecimal($min, $max)
    {
        return mt_rand($min * 10, $max * 10) / 10.0;
    }

    public function run()
    {
        $users = User::all();
        $books = Book::all();

        $subject = [
            "Great book! This story brought back memories of my childhood.",
            "Excellent read! It resonated with me on a personal level.",
            "Fantastic book! It evoked nostalgia for simpler times.",
            "Wonderful read! Reminds me of the adventures I had growing up.",
            "Amazing book! It captured the essence of innocence and wonder.",
            "Impressive story! It transported me back to my youth.",
            "Terrific book! It felt like revisiting cherished memories.",
            "Outstanding read! This book made me nostalgic for carefree days.",
            "Incredible book! It mirrored my childhood experiences.",
            "Superb story! It felt like reliving moments from my past.",
        ];

        foreach ($books as $book) {
            for($i = 0; $i < rand(1, 8); $i++) {
                Feedback::create([
                    'UserId' => $users[rand(0, count($users) - 1)]->id,
                    'ISBN' => $book->ISBN,
                    'Subject' => $subject[rand(0, count($subject) - 1)],
                    'Rating' => self::randOneDecimal(0, 10),
                ]);
            }
        }
    }
}
