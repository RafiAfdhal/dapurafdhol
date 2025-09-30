<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPenjualan extends Model
{
    protected $table = 'laporan_penjualan';

    protected $fillable = [
        'menu_id',
        'nama_produk',
        'jumlah',
        'pendapatan',
        'bulan',
        'tahun',
    ];
}
