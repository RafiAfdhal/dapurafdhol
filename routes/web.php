<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Pelanggan\HomeController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Halaman Awal
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('welcome'));



/*
|--------------------------------------------------------------------------
| Auth (Fortify Override)
|--------------------------------------------------------------------------
*/

// Forgot Password (override view)
Route::get('/forgot-password', function () {
    return view('auth.forgot-password'); // custom view
})->middleware('guest')->name('password.request');

// Forgot Password (kirim email reset link)
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

// Reset Password (override view)
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

// Reset Password (update password)
Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');


/*
|--------------------------------------------------------------------------
| Redirect Setelah Login
|--------------------------------------------------------------------------
*/
Route::get('/redirect-after-login', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    return match (Auth::user()->role) {
        'admin'     => redirect()->route('admin.dashboard'),
        'pelanggan' => redirect()->route('pelanggan.home'),
        default     => abort(403, 'Role tidak dikenali'),
    };
})->name('redirect.after.login')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Area Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Profil Admin
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
        Route::delete('/admin/profile/photo', [UserController::class, 'deletePhoto'])->name('profile.deletePhoto');


        // Dashboard Admin
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // CRUD Menu
        Route::resource('menu', MenuController::class);

        // CRUD Kategori
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);

        // CRUD Users
        Route::resource('users', UserController::class);

        // Reviews
        Route::resource('reviews', ReviewController::class)->only(['index', 'show']);
        Route::delete('reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

        // Orders
        Route::resource('orders', OrderController::class)->only(['index', 'show']);
        Route::patch('/admin/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

        // Laporan Penjualan
        Route::get('/laporan', [\App\Http\Controllers\Admin\LaporanController::class, 'index'])
            ->name('laporan.index');

        // Pesan Kontak
        Route::get('/pesan', [\App\Http\Controllers\Admin\PesanKontakController::class, 'index'])->name('pesan.index');
        Route::get('/pesan/{id}', [\App\Http\Controllers\Admin\PesanKontakController::class, 'show'])->name('pesan.show');
        Route::delete('/pesan/{id}', [\App\Http\Controllers\Admin\PesanKontakController::class, 'destroy'])->name('pesan.destroy');
    });



/*
|--------------------------------------------------------------------------
| Area Pelanggan kalau sudah login baru bisa akses
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role_pelanggan'])
    ->prefix('pelanggan')
    ->name('pelanggan.')
    ->group(function () {
        // Home
        Route::get('/home', function () {
            return view('pelanggan.home');
        })->name('home');

        // Kontak
        Route::get('/kontak', function () {
            return view('pelanggan.kontak');
        })->name('kontak');
        Route::post('/kontak/kirim', [HomeController::class, 'kirimKontak'])->name('kontak.kirim');

        // Checkout langsung dari menu
        Route::get('/checkout/{menu}', [HomeController::class, 'checkout'])->name('checkout');
        Route::post('/checkout/{menu}', [HomeController::class, 'processCheckout'])->name('checkout.process');

        // Ulasan Menu
        Route::get('/ulasan/{menuId}', [HomeController::class, 'index'])->name('ulasan');
        Route::post('/ulasan/{menuId}', [HomeController::class, 'store'])->name('ulasan.store');
        Route::delete('/ulasan/{reviewId}', [HomeController::class, 'destroy'])->name('ulasan.destroy');

        // Cart
        Route::post('/cart/add/{menu}', [HomeController::class, 'addToCart'])->name('cart.add');
        Route::get('/cart', [HomeController::class, 'showCart'])->name('cart.show');
        Route::delete('/cart/remove/{item}', [HomeController::class, 'removeFromCart'])->name('cart.remove');
        Route::put('/cart/update/{item}', [HomeController::class, 'updateCartItem'])->name('cart.update');


        // Checkout dari Cart
        Route::get('/checkout-cart', [HomeController::class, 'checkoutCart'])->name('checkout-cart');
        Route::post('/checkout/cart/process', [HomeController::class, 'processCheckoutCart'])->name('checkout.cart.process');
        Route::put('/cart/update/{item}', [HomeController::class, 'updateCartItem'])->name('cart.update');

        // Riwayat Pesanan Pelanggan
        Route::get('/riwayat', [HomeController::class, 'riwayat'])->name('riwayat');
        Route::get('/riwayat/{order}', [HomeController::class, 'riwayatDetail'])->name('riwayat.detail');
        Route::patch('/riwayat/{order}/cancel', [HomeController::class, 'cancel'])->name('riwayat.cancel');
        Route::delete('/riwayat/{order}/delete', [HomeController::class, 'destroypesanan'])->name('riwayat.destroy');
        Route::patch('/pelanggan/riwayat/{order}/terima', [HomeController::class, 'terimaPesanan'])->name('riwayat.terima');

        // Profil Pelanggan
        Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
        Route::put('/profile', [HomeController::class, 'updateProfile'])->name('profile.update');
        Route::delete('/profile/photo', [HomeController::class, 'deletePhoto'])->name('profile.deletePhoto');
    });

/*
|--------------------------------------------------------------------------
| Halaman Umum (Tanpa Login)
|--------------------------------------------------------------------------
*/
Route::prefix('pelanggan')
    ->name('pelanggan.')
    ->group(function () {

        // Home (bebas diakses)
        Route::get('/home', function () {
            return view('pelanggan.home');
        })->name('home');

        // Menu (bebas diakses)
        Route::get('/menu', [HomeController::class, 'menu'])->name('menu');

        // Tentang
        Route::get('/tentang', fn() => view('pelanggan.tentang'))->name('tentang');

        // Kontak (form bisa diakses tapi kirim pesan butuh login)
        Route::get('/kontak', fn() => view('pelanggan.kontak'))->name('kontak');
        Route::post('/kontak/kirim', [HomeController::class, 'kirimKontak'])
            ->middleware('auth')
            ->name('kontak.kirim');
    });
