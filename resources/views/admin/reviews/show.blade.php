@extends('layouts.admin.master')

@section('title', 'Detail Ulasan')

@section('content')
<div class="container my-4">
    <!-- Judul -->
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('admin.reviews.index') }}" class="text-decoration-none me-3">
            <i class="bi bi-arrow-left-circle" style="font-size: 1.8rem; color: #3E2723;"></i>
        </a>
        <h2 class="fw-bold text-dark mb-0">Detail Ulasan Produk</h2>
    </div>

    <!-- Detail Produk -->
    <div class="card shadow-sm border-0 mb-5 rounded-3" style="overflow:hidden;">
        <div class="row g-0">
            <div class="col-md-4">
                @if($menu->gambar)
                    <img src="{{ asset('storage/' . $menu->gambar) }}" 
                         alt="{{ $menu->nama }}" 
                         class="img-fluid h-100 object-fit-cover">
                @else
                    <img src="https://via.placeholder.com/400x300/FFB300/3E2723?text=No+Image" 
                         alt="No Image" 
                         class="img-fluid h-100 object-fit-cover">
                @endif
            </div>
            <div class="col-md-8 p-4">
                <h3 class="fw-bold mb-3">{{ $menu->nama }}</h3>
                @php
                    $avgRating = $menu->reviews->avg('rating') ?? 0;
                    $fullStars = floor($avgRating);
                @endphp
                <div class="d-flex align-items-center mb-2">
                    <span class="fs-4 fw-bold me-2" style="color:#3E2723;">
                        {{ number_format($avgRating,1) }}/5
                    </span>
                    <div class="d-flex fs-5 text-warning me-2">
                        @for($i=1;$i<=5;$i++)
                            <i class="bi {{ $i <= $fullStars ? 'bi-star-fill' : 'bi-star' }}"></i>
                        @endfor
                    </div>
                    <span class="text-muted">({{ $menu->reviews->count() }} ulasan)</span>
                </div>
                <p class="mb-0 text-muted">Harga: Rp {{ number_format($menu->harga,0,',','.') }} / porsi</p>
            </div>
        </div>
    </div>

    <!-- Daftar Ulasan -->
    <h4 class="fw-semibold mb-4">Ulasan Pelanggan</h4>
    @forelse($menu->reviews as $review)
        <div class="card border-0 shadow-sm mb-4 p-4 rounded-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div>
                    <h6 class="fw-bold mb-0">{{ $review->user->name ?? 'User Tidak Diketahui' }}</h6>
                    <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
                </div>
                <div class="d-flex fs-6 text-warning">
                    @for($i=1;$i<=5;$i++)
                        <i class="bi {{ $i <= $review->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                    @endfor
                </div>
            </div>
            <p class="mb-3 text-secondary">{{ $review->review_text ?? '-' }}</p>

            <!-- Tombol hapus -->
            <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" 
                  onsubmit="return confirm('Yakin hapus ulasan ini?')" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="bi bi-trash3"></i> Hapus
                </button>
            </form>
        </div>
    @empty
        <p class="text-center text-muted py-4">Belum ada ulasan untuk produk ini.</p>
    @endforelse

    <!-- Back -->
    <div class="mt-4 text-center">
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-outline-dark">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Produk
        </a>
    </div>
</div>
@endsection
