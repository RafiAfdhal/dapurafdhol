<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dapur Afdhol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* Palet Warna Dapur Afdhol:
         * Cokelat Gelap (body background overlay): #6D4C41 (RGBA: 109, 76, 65)
         * Cokelat Sedang (login-container / footer background): #8D6E63 (RGBA: 141, 110, 99) -> Di sini akan pakai 6D4C41 untuk footer
         * Oranye/Kuning (aksen, button, link): #FFB300
         * Oranye Cerah (button hover): #FF8A00
         * Oranye Gelap (button hover darker): #E67A00
         * Krem (text, input background): #FBE9E7
         * Teks Utama: #3E2723 (Dark Brown)
         * Teks Sekunder/Placeholder: #A1887F (Medium Brown)
         */

        body {
            font-family: 'Poppins', sans-serif;
            /* Font utama untuk body */
            color: #3E2723;
            /* Warna teks utama */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            position: relative;
            overflow-x: hidden;
        }

        /* Overlay untuk transparansi pada background */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(109, 76, 65, 0.75);
            /* Sedikit lebih gelap dari sebelumnya */
            z-index: -1;
        }

        h1,
        h2,
        h5,
        h6 {
            font-family: 'Playfair Display', serif;
            /* Font elegan untuk judul */
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.9);
            /* Sedikit lebih transparan */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            /* Bayangan lebih halus */
            backdrop-filter: blur(8px);
            /* Efek frosted glass */
            -webkit-backdrop-filter: blur(8px);
            /* Kompatibilitas Safari */
            border-bottom: 1px solid rgba(255, 179, 0, 0.2);
            /* Garis tipis di bawah navbar */
        }

        .navbar-brand img {
            transition: transform 0.3s ease;
            /* Transisi untuk efek hover logo */
            height: 75px;
            /* Ukuran logo yang disesuaikan */
        }

        .navbar-brand img:hover {
            transform: scale(1.05);
            /* Efek zoom saat hover logo */
        }

        .nav-link {
            color: #3E2723 !important;
            font-weight: 500;
            /* Medium weight */
            padding: 10px 18px !important;
            /* Padding yang konsisten */
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #FF8A00 !important;
            /* Warna oranye cerah saat hover */
        }

        .nav-link.active {
            background-color: #FFB300 !important;
            color: #3E2723 !important;
            border-radius: 10px;
            font-weight: 600;
            /* Semi-bold */
            box-shadow: 0 2px 8px rgba(255, 179, 0, 0.4);
            /* Bayangan untuk active link */
        }

        .btn-primary-custom {
            background-color: #FF8A00;
            border-color: #FF8A00;
            color: white;
            font-weight: 600;
            padding: 12px 25px;
            /* Padding lebih besar */
            border-radius: 30px;
            /* Lebih bulat */
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            background-color: #E67A00;
            border-color: #E67A00;
            transform: translateY(-2px);
            /* Efek angkat saat hover */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-outline-custom {
            border: 2px solid #FF8A00;
            color: #FF8A00;
            font-weight: 600;
            padding: 12px 25px;
            /* Padding lebih besar */
            border-radius: 30px;
            /* Lebih bulat */
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background-color: #FF8A00;
            color: white;
            transform: translateY(-2px);
            /* Efek angkat saat hover */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .rounded-img {
            border-radius: 20px;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .avatar-icon,
        .cart-icon {
            /* Menambahkan cart-icon di sini */
            width: 48px;
            /* Sedikit lebih besar */
            height: 48px;
            border: 3px solid #FFB300;
            /* Border lebih tebal */
            border-radius: 50%;
            color: #FFB300;
            font-size: 1.5rem;
            /* Ukuran ikon di dalam lingkaran */
            display: flex;
            /* Untuk memusatkan ikon */
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            background-color: rgba(255, 179, 0, 0.1);
            /* Latar belakang ikon transparan */
        }

        .avatar-icon:hover,
        .cart-icon:hover {
            /* Menambahkan cart-icon di sini */
            background-color: #FFB300;
            color: white;
            border-color: #E67A00;
            box-shadow: 0 4px 10px rgba(255, 179, 0, 0.5);
        }

        /* search-bar styles removed */

        .hero-section {
            color: #FBE9E7;
            padding-top: 6rem;
            /* Padding lebih banyak */
            padding-bottom: 6rem;
            text-align: left;
            /* Teks rata kiri */
        }

        .hero-section h1 {
            color: #FFB300;
            font-size: 3.5rem;
            /* Ukuran font lebih besar */
            line-height: 1.2;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
            /* Shadow lebih kuat */
        }

        .hero-section p {
            color: #FBE9E7;
            font-size: 1.1rem;
            /* Ukuran paragraf lebih besar */
            margin-bottom: 2rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
        }

        /* Gambar di hero section */
        .hero-section img {
            border: 6px solid rgba(255, 179, 0, 0.8);
            /* Border lebih tebal dan buram */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            /* Bayangan lebih kuat */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hero-section img:hover {
            transform: scale(1.02);
            /* Sedikit zoom saat hover */
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
        }

        /* Galeri makanan */
        .gallery-section {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        .gallery-section h2 {
            color: #FFB300;
            margin-bottom: 3rem;
            font-size: 2.5rem;
            text-align: center;
        }

        .gallery-card {
            background-color: #FBE9E7;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }

        .gallery-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 3px solid #FFB300;
        }

        .gallery-card-body {
            padding: 1.5rem;
            text-align: center;
            flex-grow: 1;
        }

        .gallery-card h5 {
            color: #3E2723;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        footer {
            background-color: #6D4C41 !important;
            color: #FBE9E7 !important;
            margin-top: auto;
            padding-top: 3rem;
            /* Padding lebih banyak */
            padding-bottom: 3rem;
            border-top: 1px solid rgba(255, 179, 0, 0.2);
            /* Garis tipis di atas footer */
        }

        footer h5,
        footer h6 {
            color: #FFB300 !important;
            margin-bottom: 1rem;
        }

        footer p,
        footer li {
            font-size: 0.95rem;
            /* Ukuran teks lebih teratur */
            line-height: 1.6;
        }

        footer a {
            color: #FBE9E7 !important;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #FFB300 !important;
            text-decoration: underline;
        }

        footer .d-flex.gap-3 a {
            font-size: 1.8rem !important;
            /* Ukuran ikon sosial lebih besar */
            transition: transform 0.3s ease;
        }

        footer .d-flex.gap-3 a:hover {
            transform: translateY(-3px);
            /* Efek angkat pada ikon sosial */
            color: #FF8A00 !important;
        }

        footer .text-white-50 {
            color: rgba(251, 233, 231, 0.6) !important;
            margin-top: 2rem !important;
            font-size: 0.85rem;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-white px-4 py-3 sticky-top" data-aos="fade-down">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Dapur Afdhol">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3">
                    @guest
                    <li class="nav-item" data-aos="fade-left" data-aos-delay="100">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item" data-aos="fade-left" data-aos-delay="200">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    {{-- Redirect otomatis kalau sudah login --}}
                    @auth
                    @php
                    if (Auth::user()->role === 'admin') {
                    header("Location: " . route('admin.dashboard'));
                    exit;
                    } else {
                    header("Location: " . route('pelanggan.home'));
                    exit;
                    }
                    @endphp
                    @endauth
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="container py-5 hero-section flex-grow-1 d-flex align-items-center">
        <div class="row align-items-center">
            <div class="col-md-5" data-aos="fade-right">
                <img src="{{ asset('img/mie ayam jamur.jpg') }}" alt="Makanan 1" class="img-fluid rounded-4 shadow">
            </div>
            <div class="col-md-7" data-aos="fade-left">
                <h1 class="fw-bold mb-3">Dapur Afdhol <br>Mantap</h1>
                <p class="mb-4">Mulailah hari dengan lezat dan sehat. Temukan makanan kesukaan...</p>
                <div class="row g-3 mb-4">
                    <div class="col-6 col-md-4" data-aos="zoom-in" data-aos-delay="200">
                        <img src="{{ ('img/nasi goreng special.jpg') }}" alt="foto makanan" class="img-fluid rounded-4 shadow">
                    </div>
                    <div class="col-6 col-md-4" data-aos="zoom-in" data-aos-delay="400">
                        <img src="{{ asset('img/sate ayam.jpg') }}" alt="foto makanan" class="img-fluid rounded-4 shadow">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Food Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <h2 class="text-center fw-bold" data-aos="fade-up">Galeri Hidangan Kami</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="gallery-card">
                        <img src="{{ asset('img/surabi.jpg') }}" alt="Surabi">
                        <div class="gallery-card-body">
                            <h5 class="card-title">Surabi</h5>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="gallery-card">
                        <img src="{{ asset('img/nasi goreng special.jpg') }}" alt="Nasi Goreng">
                        <div class="gallery-card-body">
                            <h5 class="card-title">Nasi Goreng</h5>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="gallery-card">
                        <img src="{{ asset('img/mie ayam jamur.jpg') }}" alt="Mie Ayam">
                        <div class="gallery-card-body">
                            <h5 class="card-title">Mie Ayam</h5>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                    <div class="gallery-card">
                        <img src="{{ asset('img/telor gulung.jpg') }}" alt="Telor Gulung">
                        <div class="gallery-card-body">
                            <h5 class="card-title">Telor Gulung</h5>
                        </div>
                    </div>
                </div>
                <!-- sisanya tinggal tambahin data-aos-delay 500, 600, dst -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 mt-5" data-aos="fade-up">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8">
                    <h4 class="mb-3">Tentang Kami</h4>
                    <p class="small">
                        <strong>Dapur Afdhol</strong> adalah layanan pemesanan makanan online ...
                    </p>
                    <p class="small mb-0">
                        Dengan bahan-bahan segar dan resep pilihan, ...
                    </p>
                </div>
            </div>
            <div class="text-center text-white-50 mt-4 small">
                &copy; 2024 Dapur Afdhol. Semua hak dilindungi.
            </div>
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200,
            once: true
        });
    </script>
</body>

</html>