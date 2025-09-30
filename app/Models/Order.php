<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status',
        'metode_pembayaran',
        'metode_pengantaran',
        'catatan',
        'alamat',
        'nama_penerima',
        'no_telepon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // === Tambahan ===
    protected static function booted()
    {
        static::updated(function ($order) {
            if ($order->status === 'selesai') {
                foreach ($order->items as $item) {
                    \App\Models\LaporanPenjualan::create([
                        'menu_id'     => $item->menu_id,
                        'nama_produk' => $item->menu->nama,
                        'jumlah'      => $item->jumlah,
                        'pendapatan'  => $item->jumlah * $item->harga,
                        'bulan'       => now()->month,
                        'tahun'       => now()->year,
                    ]);
                }
            }
        });
    }
}
