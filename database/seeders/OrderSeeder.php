<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Menu;

class OrderSeeder extends Seeder
{
    public function run(): void
    {

        $user = User::where('role', 'pelanggan')->get();
        $menu = Menu::first();

        if (!$user || !$menu) {
            return;
        }

        $order = Order::create([
            'user_id' => $user->id,
            'total' => $menu->harga * 2,
            'status' => 'pending',
            'metode_pembayaran' => 'gopay',
            'catatan' => 'Jangan pakai bawang',
            'alamat' => 'Jl. Contoh No. 123',
            'nama_penerima' => 'Budi',
            'no_telepon' => '08123456789',
        ]);

        $order->items()->create([
            'menu_id' => $menu->id,
            'jumlah' => 2,
            'harga' => $menu->harga,
        ]);
    }
}
