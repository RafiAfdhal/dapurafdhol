@extends('layouts.pelanggan.master')

@section('content')
    @include('layouts.pelanggan.cssmenu')

    {{-- Hero Section --}}
    <section class="menu-hero py-5 mb-4 bg-light">
        <div class="container">
            <h1 class="section-title text-center mb-4 display-4 fw-bold text-warning">
                Menu Spesial Dapur Afdhol
            </h1>
        

        {{-- Search Bar --}}
        <form action="{{ route('pelanggan.menu') }}" method="GET" class="search-form mx-auto" style="max-width: 600px;">
            <div class="input-group shadow-sm rounded-pill overflow-hidden">
                <input type="text" name="search" class="form-control border-0 py-3 ps-4 search-input"
                    placeholder="Cari menu favorit Anda..." value="{{ request('search') }}" aria-label="Cari menu">
                <button type="submit" class="btn btn-primary px-4 btn-search">
                    <i class="bi bi-search me-1"></i> Cari
                </button>
            </div>
        </form>
    </section>

    {{-- Content --}}
    <section class="container py-5">
        <div class="menu-content-wrapper">

            {{-- Filter Kategori --}}
            <div class="menu-filter-column mb-4">
                <h5 class="mb-3">Filter Kategori</h5>
                <form method="GET" action="{{ route('pelanggan.menu') }}">
                    <div class="kategori-filter-vertical d-flex flex-column gap-2">
                        <button type="submit" name="kategori_id" value=""
                            class="kategori-btn-vertical {{ request('kategori_id') == '' ? 'active' : '' }}">
                            Semua
                        </button>
                        @foreach ($kategoris as $kat)
                            <button type="submit" name="kategori_id" value="{{ $kat->id }}"
                                class="kategori-btn-vertical {{ request('kategori_id') == $kat->id ? 'active' : '' }}">
                                {{ $kat->nama }}
                            </button>
                        @endforeach
                    </div>
                </form>
            </div>


            {{-- Menu Items --}}
            <div class="menu-items-column">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="menu-items-container">
                    @forelse ($menus as $menu)
                        <div class="col menu-item">
                            <div class="menu-card">
                                {{-- Gambar --}}
                                @if ($menu->gambar)
                                    <img src="{{ asset('storage/' . $menu->gambar) }}" class="card-img-top"
                                        alt="{{ $menu->nama }}">
                                @else
                                    <img src="https://via.placeholder.com/400x200/FFB300/3E2723?text=No+Image"
                                        class="card-img-top" alt="No Image">
                                @endif

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $menu->nama }}</h5>
                                    <p class="card-text">{{ Str::limit($menu->deskripsi, 100) }}</p>


                                    {{-- Rating Bintang + Link Ulasan --}}
                                    <a href="{{ route('pelanggan.ulasan', $menu->id) }}"
                                        class="d-flex align-items-center mb-2 text-decoration-none">
                                        <div class="d-flex rating-stars-display fs-5 text-warning me-2">
                                            @php
                                                $avgRating = $menu->reviews->avg('rating') ?? 0;
                                                $fullStars = floor($avgRating);
                                            @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="bi {{ $i <= $fullStars ? 'bi-star-fill' : 'bi-star' }}"></i>
                                            @endfor
                                        </div>
                                        <span class="text-muted">({{ $menu->reviews->count() }} ulasan)</span>
                                    </a>


                                    {{-- Harga & Stok --}}
                                    <div class="d-flex justify-content-between align-items-center mt-auto item-actions">
                                        <div>
                                            <span class="item-price d-block">Rp
                                                {{ number_format($menu->harga, 0, ',', '.') }}</span>
                                            <small class="text-muted">
                                                Stok: {{ $menu->stok > 0 ? $menu->stok : 'Habis' }}
                                            </small>
                                        </div>
                                        <div class="d-flex align-items-center action-buttons">
                                            @if ($menu->stok > 0)
                                                <a href="{{ route('pelanggan.checkout', $menu->id) }}"
                                                    class="btn btn-add-to-cart">Pesan</a>
                                                <form action="{{ route('pelanggan.cart.add', $menu->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-cart-icon ms-2">
                                                        <i class="bi bi-cart-plus"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <span class="badge bg-danger">Stok Habis</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Belum ada menu tersedia.</p>
                    @endforelse
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-3">
                    {{ $menus->withQueryString()->links('pagination::default') }}
                </div>

            </div>
        </div>
    </section>

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
