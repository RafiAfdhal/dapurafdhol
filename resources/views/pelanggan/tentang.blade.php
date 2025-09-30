@extends('layouts.pelanggan.master')

@section('title', 'Tentang - Dapur Afdhol')

@section('content')
@include('layouts.pelanggan.csstentang')

<main>
    <section class="hero-about text-center d-flex align-items-center justify-content-center px-3">
        <div class="container">
            <h1>Kisah di Balik Setiap Gigitan Lezat</h1>
            <p class="lead mt-3">Dapur Afdhol hadir untuk menyajikan kehangatan masakan rumahan langsung ke pintu Anda, dengan mudah dan penuh cinta.</p>
        </div>
    </section>

    <section class="about-section-intro">
        <div class="container">
            <img src="{{ asset('img/logo.png') }}" alt="Dapur Afdhol Logo"
                 style="height: 200px; margin-bottom: 2rem; display: block; margin-left: auto; margin-right: auto;">
            <h2>Tentang Dapur Afdhol</h2>
            <p>
                Sejak didirikan pada <strong>tahun 2020</strong>, Dapur Afdhol telah tumbuh menjadi layanan pemesanan makanan online tepercaya 
                yang berkomitmen menghadirkan hidangan khas Indonesia yang lezat, sehat, dan higienis.
                Kami percaya bahwa setiap hidangan adalah sebuah cerita, dan kami berdedikasi untuk menciptakan cerita rasa terbaik 
                untuk Anda dan keluarga.
            </p>
        </div>
    </section>

    <section class="about-cards-section">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <div class="col">
                    <div class="about-card">
                        <div class="icon-wrapper"><i class="bi bi-lightbulb-fill"></i></div>
                        <h5>Visi & Misi Kami</h5>
                        <p>Menjadi pilihan utama untuk masakan rumahan online di Indonesia, menyajikan kebahagiaan dan kemudahan melalui hidangan berkualitas tinggi dan layanan terbaik.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="about-card">
                        <div class="icon-wrapper"><i class="bi bi-laptop-fill"></i></div>
                        <h5>Website Kami: Praktis & Modern</h5>
                        <p>Platform Dapur Afdhol dirancang untuk kemudahan Anda. Jelajahi menu, pesan cepat, dan lacak pesanan dengan antarmuka yang intuitif dan responsif di setiap perangkat.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="about-card">
                        <div class="icon-wrapper"><i class="bi bi-hand-thumbs-up-fill"></i></div>
                        <h5>Prioritas Utama: Kualitas</h5>
                        <p>Kami hanya menggunakan bahan-bahan segar pilihan dan rempah asli terbaik. Setiap hidangan dimasak dengan standar kebersihan dan keamanan pangan tertinggi.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="about-card">
                        <div class="icon-wrapper"><i class="bi bi-people-fill"></i></div>
                        <h5>Tim Chef Profesional</h5>
                        <p>Di balik setiap hidangan lezat Dapur Afdhol, ada tim chef berpengalaman yang berdedikasi menciptakan cita rasa autentik dan menggugah selera.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="about-card">
                        <div class="icon-wrapper"><i class="bi bi-truck-flatbed"></i></div>
                        <h5>Pengiriman Cepat & Aman</h5>
                        <p>Kami memahami pentingnya kecepatan. Pesanan Anda akan diantar dengan aman dan efisien, memastikan makanan tiba dalam kondisi terbaik.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="about-card">
                        <div class="icon-wrapper"><i class="bi bi-heart-fill"></i></div>
                        <h5>Fokus pada Kepuasan Anda</h5>
                        <p>Kepuasan pelanggan adalah motivasi utama kami. Kami selalu mendengarkan umpan balik untuk terus meningkatkan kualitas hidangan dan layanan kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section-intro py-5">
        <div class="container">
            <h2 class="mb-4">Siap Mencicipi Kelezatan Dapur Afdhol?</h2>
            <p class="mb-4">Jelajahi menu kami yang beragam dan temukan hidangan favorit baru Anda!</p>
            <a href="{{ route('pelanggan.menu') }}" class="btn btn-warning btn-lg fw-bold"
               style="background-color: #FFB300; color: #3E2723; border: none;">Lihat Menu Sekarang!</a>
        </div>
    </section>
</main>

@endsection
