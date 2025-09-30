<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Makan siang', 'Makan malam', 'Sarapan'];

        foreach ($categories as $category) {
            Category::create([
                'nama' => $category
            ]);
        }
    }
}