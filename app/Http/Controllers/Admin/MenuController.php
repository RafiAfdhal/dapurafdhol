<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $status_options = ['Tersedia', 'Tidak Tersedia'];

        $menus = Menu::with('category') // eager load relasi category
            ->when($request->filled('kategori_id'), function ($query) use ($request) {
                return $query->where('kategori_id', $request->kategori_id);
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                return $query->where('status', $request->status);
            })
            ->latest()
            ->paginate(10);

        $kategori = Category::all(); // ambil semua kategori


        return view('admin.menu.index', compact('menus', 'kategori', 'status_options'));
    }

    public function create()
    {
        $kategori = Category::all(); // ambil dari tabel
        return view('admin.menu.create', compact('kategori'));
    }

 // Store menu
public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'kategori_id' => 'required|exists:categories,id',
        'deskripsi' => 'nullable|string',
        'harga' => 'required|numeric|min:0',
        'stok' => 'required|integer|min:0',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $path = $request->file('gambar')?->store('menus', 'public');

    Menu::create([
        'nama' => $request->nama,
        'kategori_id' => $request->kategori_id,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'gambar' => $path,
        // otomatis status dari stok
        'status' => $request->stok > 0 ? 'Tersedia' : 'Tidak Tersedia',
    ]);

    return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil ditambahkan.');
}

// Update menu
public function update(Request $request, Menu $menu)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'kategori_id' => 'required|exists:categories,id',
        'deskripsi' => 'nullable|string',
        'harga' => 'required|numeric|min:0',
        'stok' => 'required|integer|min:0',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        if ($menu->gambar) {
            Storage::disk('public')->delete($menu->gambar);
        }
        $menu->gambar = $request->file('gambar')->store('menus', 'public');
    }

    $menu->update([
        'nama' => $request->nama,
        'kategori_id' => $request->kategori_id,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'stok' => $request->stok,
        // otomatis status dari stok
        'status' => $request->stok > 0 ? 'Tersedia' : 'Tidak Tersedia',
        'gambar' => $menu->gambar
    ]);

    return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil diperbarui.');
}

    public function destroy(Menu $menu)
    {
        if ($menu->gambar) {
            Storage::disk('public')->delete($menu->gambar);
        }
        $menu->delete();
        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil dihapus.');
    }

    public function show(Menu $menu)
    {
        $menu->load('category'); // biar relasi kategori ikut ke-load
        return view('admin.menu.show', compact('menu'));
    }

    public function edit(Menu $menu)
{
    $kategori = Category::all();
    return view('admin.menu.edit', compact('menu', 'kategori'));
}

}
