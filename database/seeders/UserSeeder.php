<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'afdhol@ganteng.com',
            'no_telepon' => '081234567890', // Nomor telepon admin
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Kurir Dapur Afdhol',
            'email' => 'kurir@dapurafdhol.com',
            'no_telepon' => '081234567891', // Nomor telepon kurir
            'password' => Hash::make('password123'),
            'role' => 'pelanggan',
        ]);

        User::create([
            'name' => 'Pelanggan Dapur Afdhol',
            'email' => 'pelanggan@dapurafdhol.com',
            'no_telepon' => '081234567892', // Nomor telepon pelanggan
            'password' => Hash::make('password123'),
            'role' => 'pelanggan',
        ]);
    }
}
