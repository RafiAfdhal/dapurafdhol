<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        Review::create([
            'user_id' => 3, // id pelanggan
            'menu_id' => 1, // id menu
            'rating' => 5,
            'review_text' => 'Makanannya enak banget!',
        ]);

        Review::create([
            'user_id' => 3,
            'menu_id' => 2,
            'rating' => 4,
            'review_text' => 'Lumayan enak tapi agak pedas.',
        ]);
    }
}
