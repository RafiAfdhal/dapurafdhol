<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel menus.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'nama' => 'Nasi Goreng Spesial',
                'kategori' => 'Makan Malam',
                'deskripsi' => 'Nasi goreng dengan telur, ayam suwir, dan kerupuk.',
                'harga' => 25000,
                'stok' => 20,
                'gambar' => 'nasi_goreng.jpg',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ayam Bakar Madu',
                'kategori' => 'Makan Siang',
                'deskripsi' => 'Ayam bakar dengan bumbu madu manis gurih.',
                'harga' => 30000,
                'stok' => 15,
                'gambar' => 'ayam_bakar.jpg',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Es Teh Manis',
                'kategori' => 'Minuman',
                'deskripsi' => 'Teh manis segar dengan es batu.',
                'harga' => 8000,
                'stok' => 50,
                'gambar' => 'es_teh.jpg',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Puding Cokelat',
                'kategori' => 'Dessert',
                'deskripsi' => 'Puding cokelat lembut dengan saus vla.',
                'harga' => 12000,
                'stok' => 10,
                'gambar' => 'puding_cokelat.jpg',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
