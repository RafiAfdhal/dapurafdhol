<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahMenu = Menu::count();
        $jumlahUser = User::count();
        $pesananTerbaru = Order::latest()->take(5)->get(); // ambil 5 pesanan terbaru

        return view('admin.dashboard', [
            'jumlahMenu' => $jumlahMenu,
            'jumlahUser' => $jumlahUser,
            'pesananTerbaru' => $pesananTerbaru,
        ]);
    }
}