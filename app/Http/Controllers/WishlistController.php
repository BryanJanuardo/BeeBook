<?php

namespace App\Http\Controllers;

// use App\Models\Wishlist; 
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function addWishlist($ISBN, $UserId){
        Wishlist::create([
            'ISBN' => $ISBN,
            'UserId' => $UserId
        ]);

        return redirect()->route('Dashboard');
    }

    public function index(){
        $wishlists = [
            (object)[
                'book' => (object)[
                    'BookTitle' => 'Dummy Book 1',
                    'BookPicture' => 'dummy_cover_image_1.jpg',
                    'ISBN' => '978-3-16-148410-0' // Add ISBN
                ],
                'id' => 1
            ],
            (object)[
                'book' => (object)[
                    'BookTitle' => 'Dummy Book 2',
                    'BookPicture' => 'dummy_cover_image_2.jpg',
                    'ISBN' => '978-3-16-148411-7' // Add ISBN
                ],
                'id' => 2
            ],
            (object)[
                'book' => (object)[
                    'BookTitle' => 'Dummy Book 3',
                    'BookPicture' => 'dummy_cover_image_3.jpg',
                    'ISBN' => '978-3-16-148412-4' // Add ISBN
                ],
                'id' => 3
            ],
            (object)[
                'book' => (object)[
                    'BookTitle' => 'Dummy Book 4',
                    'BookPicture' => 'dummy_cover_image_4.jpg',
                    'ISBN' => '978-3-16-148413-1' // Add ISBN
                ],
                'id' => 4
            ],
            (object)[
                'book' => (object)[
                    'BookTitle' => 'Dummy Book 5',
                    'BookPicture' => 'dummy_cover_image_5.jpg',
                    'ISBN' => '978-3-16-148414-8' // Add ISBN
                ],
                'id' => 5
            ],
            (object)[
                'book' => (object)[
                    'BookTitle' => 'Dummy Book 6',
                    'BookPicture' => 'dummy_cover_image_6.jpg',
                    'ISBN' => '978-3-16-148415-5' // Add ISBN
                ],
                'id' => 6
            ],
            (object)[
                'book' => (object)[
                    'BookTitle' => 'Dummy Book 7',
                    'BookPicture' => 'dummy_cover_image_7.jpg',
                    'ISBN' => '978-3-16-148416-2' // Add ISBN
                ],
                'id' => 7
            ],
            (object)[
                'book' => (object)[
                    'BookTitle' => 'Dummy Book 8',
                    'BookPicture' => 'dummy_cover_image_8.jpg',
                    'ISBN' => '978-3-16-148417-9' // Add ISBN
                ],
                'id' => 8
            ]
        ];
        return view('Wishlist', compact('wishlists'));
    }
}
