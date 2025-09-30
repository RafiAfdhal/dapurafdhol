<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\LaporanPenjualan;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'items.menu']);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $nextStatus = null;

        if ($order->status === 'pending') {
            $nextStatus = 'proses';
        } elseif ($order->status === 'proses') {
            $nextStatus = 'pengiriman';
        } elseif ($order->status === 'pengiriman') {
            $nextStatus = 'selesai';
        }

        if ($nextStatus) {
            // kalau selesai → catat laporan dulu
            if ($nextStatus === 'selesai') {
                $order->load('items.menu'); // pastikan relasi kebaca

                foreach ($order->items as $item) {
                    LaporanPenjualan::create([
                        'menu_id' => $item->menu_id,
                        'nama_produk' => $item->menu->nama,
                        'jumlah' => $item->jumlah,
                        'pendapatan' => $item->jumlah * $item->harga,
                        'bulan' => now()->month,
                        'tahun' => now()->year,
                    ]);
                }
            }

            // baru update status
            $order->update(['status' => $nextStatus]);

            return redirect()->route('admin.orders.index')
                ->with('success', 'Status pesanan diperbarui ke ' . ucfirst($nextStatus));
        }

        return back()->with('error', 'Status tidak bisa diperbarui oleh admin.');
    }
}
