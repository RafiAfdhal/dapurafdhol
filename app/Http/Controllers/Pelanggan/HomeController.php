<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\PesanKontak;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Review;
use Illuminate\Validation\Rule;



class HomeController extends Controller
{
    // =======================
    // HALAMAN MENU
    // =======================
    public function menu(Request $request)
    {
        $kategori = $request->get('kategori_id');
        $search   = $request->get('search');

        $query = Menu::query();

        if ($kategori) {
            $query->where('kategori_id', $kategori);
        }

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $menus = $query->paginate(6)->withQueryString();
        $kategoris = Category::all(); // ambil semua kategori

        return view('pelanggan.menu', compact('menus', 'kategoris', 'kategori', 'search'));
    }

  // =======================
    // KONTAK
    // =======================
    public function kirimKontak(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'subjek' => 'nullable|string|max:255',
            'pesan' => 'required|string',
        ]);

        PesanKontak::create($request->only('nama', 'email', 'subjek', 'pesan'));

        return back()->with('success', 'Pesan berhasil dikirim!');
    }

    // =======================
    // CHECKOUT SATU MENU
    // =======================
    public function checkout(Menu $menu)
    {
        return view('pelanggan.checkout', compact('menu'));
    }

    public function processCheckout(Request $request, Menu $menu)
    {
        $request->validate([
            'alamat' => 'required|string',
            'nama_penerima' => 'required|string',
            'no_telepon' => 'required|string',
            'metode_pembayaran' => 'required|in:gopay,ovo,dana,cash',
            'metode_pengantaran' => 'nullable|in:gosend,grabexpress',
            'jumlah' => 'required|integer|min:1|max:' . $menu->stok,
        ]);

        $jumlah = $request->jumlah;

        // Kurangi stok menu
        $menu->stok -= $jumlah;
        $menu->save();

        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $menu->harga * $jumlah,
            'metode_pembayaran' => $request->metode_pembayaran,
            'metode_pengantaran' => $request->metode_pengantaran,
            'alamat' => $request->alamat,
            'nama_penerima' => $request->nama_penerima,
            'no_telepon' => $request->no_telepon,
            'catatan' => $request->catatan,
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'menu_id' => $menu->id,
            'jumlah' => $jumlah,
            'harga' => $menu->harga,
        ]);

        return redirect()->route('pelanggan.menu')
            ->with('success', 'Pesanan berhasil dibuat! Stok berkurang ' . $jumlah . ' porsi.');
    }

    // =======================
    // CART
    // =======================

    // Tambah ke keranjang
    public function addToCart(Request $request, Menu $menu)
    {
        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::id()]
        );

        $cartItem = $cart->items()->where('menu_id', $menu->id)->first();

        if ($cartItem) {
            $cartItem->update([
                'jumlah' => $cartItem->jumlah + $request->input('jumlah', 1),
            ]);
        } else {
            $cart->items()->create([
                'menu_id' => $menu->id,
                'jumlah' => $request->input('jumlah', 1),
                'harga' => $menu->harga,
            ]);
        }

        return redirect()->route('pelanggan.cart.show')->with('success', 'Menu ditambahkan ke keranjang!');
    }

    // Tampilkan keranjang
    public function showCart()
    {
        $cart = Cart::with('items.menu')->where('user_id', Auth::id())->first();
        return view('pelanggan.cart', compact('cart'));
    }

    // Hapus item dari keranjang
    public function removeFromCart(CartItem $item)
    {
        if ($item->cart->user_id !== Auth::id()) {
            abort(403);
        }
        $item->delete();

        return back()->with('success', 'Item dihapus dari keranjang.');
    }

    // Update jumlah item di keranjang (tambah/kurang)
    public function updateCartItem(Request $request, CartItem $item)
    {
        if ($item->cart->user_id !== Auth::id()) {
            abort(403);
        }

        if ($request->action === 'increase') {
            $item->update(['jumlah' => $item->jumlah + 1]);
        } elseif ($request->action === 'decrease' && $item->jumlah > 1) {
            $item->update(['jumlah' => $item->jumlah - 1]);
        }

        return back()->with('success', 'Jumlah pesanan diperbarui.');
    }

    // Checkout dari keranjang
    public function checkoutCart()
    {
        $cart = Cart::with('items.menu')->where('user_id', Auth::id())->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('pelanggan.cart.show')->with('error', 'Keranjang kosong!');
        }

        return view('pelanggan.checkout-cart', compact('cart'));
    }

    // Proses checkout keranjang
    public function processCheckoutCart(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string',
            'nama_penerima' => 'required|string',
            'no_telepon' => 'required|string',
            'metode_pembayaran' => 'required|in:gopay,ovo,dana,cash',
            'metode_pengantaran' => 'nullable|in:gosend,grabexpress',
        ]);

        $cart = Cart::with('items.menu')->where('user_id', Auth::id())->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('pelanggan.cart.show')->with('error', 'Keranjang kosong!');
        }

        $total = $cart->items->sum(function ($item) {
            return $item->jumlah * $item->harga;
        });

        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'pending',
            'metode_pembayaran' => $request->metode_pembayaran,
            'metode_pengantaran' => $request->metode_pengantaran,
            'alamat' => $request->alamat,
            'nama_penerima' => $request->nama_penerima,
            'no_telepon' => $request->no_telepon,
            'catatan' => $request->catatan,
        ]);

        foreach ($cart->items as $item) {
            // kurangi stok menu
            $menu = $item->menu;
            if ($menu) {
                $menu->stok -= $item->jumlah;
                $menu->save();
            }

            // simpan order item
            $order->items()->create([
                'menu_id' => $item->menu_id,
                'jumlah' => $item->jumlah,
                'harga' => $item->harga,
            ]);
        }

        // Kosongkan keranjang
        $cart->items()->delete();

        return redirect()->route('pelanggan.menu')->with('success', 'Pesanan berhasil dibuat dari keranjang!');
    }


    // Tampilkan halaman ulasan untuk 1 menu
    public function index($menuId)
    {
        $menu = Menu::with(['reviews.user'])->findOrFail($menuId);
        return view('pelanggan.ulasan', compact('menu'));
    }

    // Simpan review
    public function store(Request $request, $menuId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'menu_id' => $menuId,
            'rating' => $request->rating,
            'review_text' => $request->review_text,
        ]);

        return redirect()->route('pelanggan.ulasan', $menuId)
            ->with('success', 'Ulasan berhasil ditambahkan!');
    }

    // Hapus review
    public function destroy($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        if ($review->user_id !== Auth::id()) {
            abort(403);
        }
        $review->delete();
        return redirect()->back()->with('success', 'Ulasan berhasil dihapus.');
    }

    // =======================
    // RIWAYAT PESANAN PELANGGAN
    // =======================
    public function riwayat()
    {
        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('pelanggan.riwayat', compact('orders'));
    }

    public function riwayatDetail(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak');
        }

        return view('pelanggan.riwayat_show', compact('order'));
    }

    public function cancel(Order $order)
    {
        // pastikan hanya user yang punya order bisa cancel
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // hanya bisa cancel kalau status pending
        if ($order->status !== 'pending') {
            return back()->with('error', 'Pesanan tidak bisa dibatalkan.');
        }

        // kembalikan stok menu
        foreach ($order->items as $item) {
            $menu = $item->menu;
            if ($menu) {
                $menu->stok += $item->jumlah; // jumlah dari order_item
                $menu->save();
            }
        }

        // update status jadi cancel
        $order->update(['status' => 'cancel']);

        return back()->with('success', 'Pesanan berhasil dibatalkan dan stok dikembalikan.');
    }

    public function destroypesanan(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        if (!in_array($order->status, ['selesai', 'cancel'])) {
            return back()->with('error', 'Pesanan hanya bisa dihapus jika sudah selesai atau dibatalkan.');
        }

        // Hapus hanya order dan order_items, laporan_penjualan tetap aman
        $order->items()->delete();
        $order->delete();

        return back()->with('success', 'Pesanan berhasil dihapus tanpa menghapus laporan.');
    }


    //terima pesanan//
    public function terimaPesanan(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($order->status !== 'pengiriman') {
            return back()->with('error', 'Pesanan belum bisa dikonfirmasi.');
        }

        $order->update(['status' => 'selesai']);

        return back()->with('success', 'Pesanan berhasil dikonfirmasi selesai.');
    }


    // =======================
    // HALAMAN PROFIL
    // =======================
    public function profile()
    {
        $user = auth()->user();
        return view('pelanggan.profile', compact('user'));
    }

    // Update profil pelanggan
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'no_telepon' => ['required', 'string', 'max:15'],
            'password' => ['nullable', 'string', 'min:8'],
            'profile_photo' => ['nullable', 'image', 'max:2048'], // max 2MB
        ]);

        // Update password hanya kalau diisi
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        // Upload foto profil
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $path = $request->file('profile_photo')->store('profile', 'public');
            $validatedData['profile_photo_path'] = $path;
        }

        $user->update($validatedData);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    // Hapus foto profil pelanggan
    public function deletePhoto(Request $request)
    {
        $user = auth()->user();
        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
            $user->update(['profile_photo_path' => null]);
        }
        return redirect()->back()->with('success', 'Foto profil berhasil dihapus.');
    }
}
