<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ReviewController extends Controller
{
    // Tampilkan daftar menu beserta rating dan filter
    public function index(Request $request)
    {
        $search = $request->input('search');
        $ratingFilter = $request->input('rating');

        // Ambil semua menu beserta relasi reviews
        $menus = Menu::with('reviews')->get();

        // Filter berdasarkan search nama menu
        if ($search) {
            $menus = $menus->filter(function ($menu) use ($search) {
                return str_contains(strtolower($menu->nama), strtolower($search));
            });
        }

        // Filter berdasarkan rata-rata rating
        if ($ratingFilter) {
            $menus = $menus->filter(function ($menu) use ($ratingFilter) {
                return $menu->reviews()->avg('rating') >= (int) $ratingFilter;
            });
        }

        // Pagination manual
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $menus->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginatedMenus = new LengthAwarePaginator(
            $currentItems,
            $menus->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('admin.reviews.index', [
            'menus' => $paginatedMenus
        ]);
    }

    // Tampilkan detail semua review untuk satu menu
    public function show($menuId)
    {
        $menu = Menu::with(['reviews.user'])->findOrFail($menuId);

        return view('admin.reviews.show', [
            'menu' => $menu
        ]);
    }

    // Hapus review
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();  
        return redirect()->back()->with('success', 'Ulasan berhasil dihapus.');
}
}
