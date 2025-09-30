<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\LaporanPenjualan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;
use Illuminate\Pagination\LengthAwarePaginator;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->get('bulan', Carbon::now()->month);
        $tahun = $request->get('tahun', Carbon::now()->year);

        // Ambil data dari laporan_penjualan
        $laporan = LaporanPenjualan::where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->get();

        $detailProduk = $laporan->groupBy('menu_id')->map(function ($items) {
            return [
                'nama_produk' => $items->first()->nama_produk,
                'jumlah_terjual' => $items->sum('jumlah'),
                'pendapatan' => $items->sum('pendapatan'),
            ];
        })->values();

        // =======================
        // Pagination manual
        // =======================
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $detailProduk->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $detailProduk = new LengthAwarePaginator(
            $currentItems,
            $detailProduk->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        $totalPendapatan = $detailProduk->sum('pendapatan');
        $totalProduk = $detailProduk->sum('jumlah_terjual');

        return view('admin.laporan.index', compact(
            'detailProduk',
            'totalPendapatan',
            'totalProduk',
            'bulan',
            'tahun'
        ));
    }
}
