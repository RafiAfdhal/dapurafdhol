@extends('layouts.pelanggan.master')

@section('content')
@include('layouts.pelanggan.csshome')

<section class="container hero-section-showcase flex-grow-1 d-flex align-items-center">
    <div class="row align-items-center justify-content-between w-100">

        {{-- Kolom Kiri: Teks dan Tombol --}}
        <div class="col-md-7 order-md-1 order-2" data-aos="fade-right" data-aos-delay="100">
            <h1 class="fw-bold">Spesial Makanan <br><span class="text-white">Dapur Afdhol</span></h1>
            <p>
               Rasakan kelezatan otentik dari hidangan khas Dapur Afdhol, disajikan dengan cita rasa premium
               dari dapur kami. Kami mengantarkan pengalaman kuliner tak terlupakan langsung ke depan pintu Anda setiap hari. 
            </p>
            
            {{-- Tombol Aksi --}}
            <div class="d-flex flex-column flex-sm-row gap-3 mt-4" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ url('pelanggan/menu') }}" class="btn btn-hero-primary">
                    <i class="bi bi-cart-fill me-2"></i> PESAN SEKARANG
                </a>
                <a href="#gallery" class="btn btn-outline-custom rounded-pill">
                    <i class="bi bi-arrow-down-circle me-2"></i> Lihat Menu Unggulan
                </a>
            </div>
        </div>

        {{-- Kolom Kanan: Gambar Utama --}}
        <div class="col-md-5 order-md-2 order-1 text-center mb-4 mb-md-0" data-aos="fade-left" data-aos-delay="200">
            <img src="{{ asset('img/mie ayam jamur.jpg') }}" alt="Mie Ayam Jamur" class="img-fluid hero-image-3d">
        </div>
    </div>
</section>

<section class="gallery-section" id="gallery">
    <div class="container">
        <h2 data-aos="fade-down">Menu Unggulan Kami</h2>

        <div class="row g-4">
            
            {{-- Kartu Menu 1: Nasi Goreng Spesial --}}
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="menu-card">
                    <img src="{{ asset('img/nasi goreng special.jpg') }}" class="card-img-top" alt="Nasi Goreng Spesial">
                    <div class="menu-card-body">
                        <h5>Nasi Goreng Spesial</h5>
                        <p class="mb-2">Nasi goreng pedas dengan ayam, telur, dan bumbu rempah rahasia. Selalu jadi favorit!</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price-tag">Rp 15.000</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kartu Menu 2: Sate Ayam Madura --}}
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="menu-card">
                    <img src="{{ asset('img/sate ayam.jpg') }}" class="card-img-top" alt="Sate Ayam Madura">
                    <div class="menu-card-body">
                        <h5>Sate Ayam Madura</h5>
                        <p class="mb-2">Daging ayam pilihan yang dipanggang sempurna dengan saus kacang kental dan legit.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price-tag">Rp 10.000</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kartu Menu 3: Mie Ayam Jamur (Menu Ikonik) --}}
            <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="menu-card">
                    <img src="{{ asset('img/thai tea.jpg') }}" class="card-img-top" alt="Mie Ayam Jamur">
                    <div class="menu-card-body">
                        <h5>Thai Tea</h5>
                        <p class="mb-2">Thai Tea khas Thailand yang menyegarkan dan nikmat, bikin tenggorokan segar.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price-tag">Rp 8.000</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- CTA untuk Melihat Semua Menu --}}
        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ url('pelanggan/menu') }}" class="btn btn-outline-custom px-5 py-3 rounded-pill">
                Lihat Semua 50+ Menu Lezat Kami
            </a>
        </div>
    </div>
</section>

@endsection
