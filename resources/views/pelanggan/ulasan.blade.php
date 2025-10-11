@extends('layouts.pelanggan.master')

@section('title', 'Ulasan Menu')

@section('content')
@include('layouts.pelanggan.cssulasan')
<main class="container">
    <div class="ulasan-container">
        <!-- Back & Title -->
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('pelanggan.menu') }}" class="text-decoration-none me-3">
                <i class="bi bi-arrow-left-short" style="font-size: 2rem; color: #3E2723;"></i>
            </a>
            <h2 class="fs-4 fw-bold mb-0">Rating & Ulasan Produk</h2>
        </div>

        <!-- Product Info -->
        <div class="product-info-ulasan mb-4">
            @if($menu->gambar)
            <img src="{{ asset('storage/'.$menu->gambar) }}" alt="{{ $menu->nama }}" class="product-img">
            @else
            <img src="https://via.placeholder.com/300x200/FFB300/3E2723?text=No+Image" class="product-img">
            @endif
            <div class="product-details">
                <h2 class="product-name">{{ $menu->nama }}</h2>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="fs-4 fw-bold" style="color: #3E2723;">
                        {{ number_format($menu->reviews->avg('rating'),1) }}
                    </span>
                    <div class="d-flex rating-stars-display fs-5 gap-1">
                        @for($i=1;$i<=5;$i++)
                            @if($i <=round($menu->reviews->avg('rating')))
                            <i class="bi bi-star-fill"></i>
                            @else
                            <i class="bi bi-star"></i>
                            @endif
                            @endfor
                    </div>
                    <span class="text-sm" style="color: #A1887F; font-size: 0.9rem;">
                        ({{ $menu->reviews->count() }} ulasan)
                    </span>
                </div>
                <p class="product-price">Rp {{ number_format($menu->harga,0,',','.') }} / porsi</p>
            </div>
        </div>

        <!-- Form Tambah Ulasan -->
        <div class="bg-light p-4 rounded-3 shadow-sm mb-5"
            style="background-color:#FBE9E7!important;border:1px solid rgba(255,179,0,0.2);">
            <h5 class="fw-semibold mb-3">Tinggalkan Ulasan Baru</h5>
            @auth
            <form action="{{ route('pelanggan.ulasan.store', $menu->id) }}" method="POST">
                @csrf
                <!-- Rating -->
                <div class="mb-3">
                    <label class="form-label">Rating:</label>
                    <div class="d-flex align-items-center rating-stars-input" id="new-review-stars">
                        @for($i=5;$i>=1;$i--)
                        <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="d-none" required>
                        <label for="star{{ $i }}"><i class="fas fa-star"></i></label>
                        @endfor
                    </div>
                </div>
                <!-- Text -->
                <div class="mb-3">
                    <label class="form-label">Ulasan Anda:</label>
                    <textarea name="review_text" rows="4" class="form-control" placeholder="Tulis ulasan Anda..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary-afdhol">Kirim Ulasan</button>
            </form>
            @else
            <p class="text-muted">Silakan <a href="{{ route('login') }}">login</a> untuk memberikan ulasan.</p>
            @endauth
        </div>

        <hr class="my-5" style="border-top: 2px solid rgba(255,179,0,0.2);">

        <!-- Daftar Ulasan -->
        <h5 class="fw-semibold mb-4">Semua Ulasan</h5>
        @forelse($menu->reviews as $review)
        <div class="review-card">
            <div class="d-flex align-items-center mb-3">
                <div class="user-avatar me-3" style="background-color:#FFB300;">
                    {{ strtoupper(substr($review->user->name,0,1)) }}
                </div>
                <div>
                    <div class="reviewer-name">{{ $review->user->name ?? 'Anonim' }}</div>
                    <div class="review-date">{{ $review->created_at->format('d M Y') }}</div>
                </div>
            </div>
            <div>
                <div class="d-flex rating-stars-display fs-6 gap-1 mb-2">
                    @for($i=1;$i<=5;$i++)
                        @if($i <=$review->rating)
                        <i class="bi bi-star-fill"></i>
                        @else
                        <i class="bi bi-star"></i>
                        @endif
                        @endfor
                        <span class="text-sm" style="color:#A1887F;font-size:0.9rem;">
                            ({{ $review->rating }})
                        </span>
                </div>
                <p class="review-text">{{ $review->review_text }}</p>

                <!-- Tombol hapus ulasan milik sendiri -->
                @auth
                @if($review->user_id === Auth::id())
                <form action="{{ route('pelanggan.ulasan.destroy', $review->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin hapus ulasan ini?')"
                    class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-trash"></i> Hapus Ulasan
                    </button>
                </form>

                @endif
                @endauth
            </div>
        </div>
        @empty
        <p class="text-muted">Belum ada ulasan untuk menu ini.</p>
        @endforelse
    </div>
    </div>


    <div class="mt-5 text-center">
        <a href="{{ route('pelanggan.menu') }}" class="btn btn-secondary-afdhol">← Kembali ke Daftar Produk</a>
    </div>
    </div>
</main>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2500,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
@endsection


 
