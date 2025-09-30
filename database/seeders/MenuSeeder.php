<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\Category;

class MenuSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel menus.
     */
    public function run(): void
    {
        $categories = Category::all();

        for ($i = 1; $i <= 10; $i++) {
            $category = $categories->random();

            $title = "Makanan " . $i . " - " . $category->name;
            Menu::create([
                'kategori_id' => $category->id,
                'nama' => $title,
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'harga' => 25000,
                'stok' => 20,
                'gambar' => null,
                'status' => true,
            ]);
        }
    }
}
