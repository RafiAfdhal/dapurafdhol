@extends('layouts.admin.master')

@section('title', 'Ulasan Pelanggan')

@section('content')
<div class="content-padding">
    <h1 class="mb-4">Daftar Produk & Rating</h1>

    <div class="admin-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="admin-card-header mb-0" style="border-bottom: none;">Produk</h5>
            <div class="d-flex align-items-center gap-2">
                <form method="GET" action="{{ route('admin.reviews.index') }}" class="d-flex gap-2 flex-wrap">
                    <input type="text" name="search" class="form-control-filter" placeholder="Cari produk..." value="{{ request('search') }}" style="width:200px;">
                    <button type="submit" class="btn btn-primary-custom">Cari</button>
                </form>
            </div>
        </div>

        <div class="table-responsive-custom">
            <table class="table table-borderless table-custom">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th class="text-center">Rating Rata-rata</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menus as $menu)
                        <tr>
                            <td>
                                <div class="product-info d-flex align-items-center gap-2">
                                    @if($menu->gambar)
                                        <img src="{{ asset('storage/'.$menu->gambar) }}" alt="{{ $menu->nama }}" width="50">
                                    @else
                                        <img src="https://via.placeholder.com/50?text=No+Image" alt="No Image">
                                    @endif
                                    <span>{{ $menu->nama }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                @php
                                    $avgRating = $menu->reviews->avg('rating') ?? 0;
                                    $fullStars = floor($avgRating);
                                @endphp
                                <div class="star-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa-star {{ $i <= $fullStars ? 'fas' : 'far' }}"></i>
                                    @endfor
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.reviews.show', $menu->id) }}" class="btn btn-sm btn-primary-custom">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">Tidak ada produk ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $menus->withQueryString()->links('pagination::default') }}
        </div>
    </div>
</div>
@endsection
