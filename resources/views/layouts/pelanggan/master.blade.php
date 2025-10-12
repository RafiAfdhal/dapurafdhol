<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Afdhol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* --- Responsif Navbar --- */
        @media (max-width: 991px) {
            .navbar-nav {
                text-align: center;
                gap: 0.75rem !important;
            }

            .navbar-brand img {
                width: 130px;
                height: auto;
            }

            .dropdown .dropdown-menu {
                text-align: center;
            }

            .cart-icon {
                font-size: 1.3rem !important;
            }

            .navbar .position-relative {
                margin-top: 10px;
                margin-right: 8px;
            }

            .navbar .dropdown {
                margin-top: 10px;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 0.75rem 1rem !important;
            }

            .navbar-brand img {
                width: 110px;
            }

            .navbar-nav {
                font-size: 0.9rem;
            }

            .rounded-circle {
                width: 40px !important;
                height: 40px !important;
            }

            .cart-icon {
                font-size: 1.2rem !important;
            }

            .badge {
                font-size: 0.65rem !important;
            }
        }

        .navbar-brand img {
            width: auto;
            height: 55px;
            object-fit: contain;
            max-width: 100%;
        }

        @media (max-width: 991px) {
            .navbar-brand img {
                height: 50px;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand img {
                height: 45px;
            }
        }

        footer .social-icons a {
            font-size: 1.6rem;
            color: #FBE9E7;
            transition: all 0.3s ease;
        }

        footer .social-icons a:hover {
            color: #FFB300;
            transform: translateY(-3px);
        }

        footer .row {
            align-items: flex-start;
            /* Pastikan semua sejajar dari atas */
        }

        footer ul {
            padding-left: 0;
            list-style: none;
        }

        footer ul li {
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-white px-3 py-3 sticky-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ url('pelanggan/home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Dapur Afdhol">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center text-lg-start" id="navbarNav">
                <ul class="navbar-nav mb-2 mb-lg-0 gap-4 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('pelanggan/home') ? 'active fw-bold text-warning' : '' }}"
                            href="{{ route('pelanggan.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('pelanggan/menu') ? 'active fw-bold text-warning' : '' }}"
                            href="{{ route('pelanggan.menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('pelanggan/riwayat') ? 'active fw-bold text-warning' : '' }}"
                            href="{{ route('pelanggan.riwayat') }}">Riwayat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('pelanggan/tentang') ? 'active fw-bold text-warning' : '' }}"
                            href="{{ route('pelanggan.tentang') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('pelanggan/kontak') ? 'active fw-bold text-warning' : '' }}"
                            href="{{ route('pelanggan.kontak') }}">Kontak</a>
                    </li>
                </ul>

                @php
                    use App\Models\Cart;
                    $cartCount = 0;
                    if (Auth::check()) {
                        $cart = Cart::with('items')->where('user_id', Auth::id())->first();
                        $cartCount = $cart ? $cart->items->sum('jumlah') : 0;
                    }
                @endphp

                <div class="d-flex align-items-center justify-content-center justify-content-lg-end mt-3 mt-lg-0">
                    <div class="position-relative me-2">
                        <a href="{{ route('pelanggan.cart.show') }}" class="text-decoration-none">
                            <i class="bi bi-cart cart-icon fs-5"></i>
                            @if ($cartCount > 0)
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger small shadow-sm"
                                    style="font-size: 0.7rem;">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                    </div>

                    {{-- Avatar / Login --}}
                    @auth
                        <div class="dropdown ">
                            <a href="#" class="d-flex align-items-center dropdown-toggle" id="userDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if (Auth::user()->profile_photo_path)
                                    <img src="{{ Auth::user()->profile_photo_url }}" alt="Avatar"
                                        class="rounded-circle border" width="45" height="45"
                                        style="object-fit: cover;">
                                @else
                                    <div class="rounded-circle border bg-secondary text-white d-flex align-items-center justify-content-center"
                                        style="width:45px; height:45px; font-weight:bold;">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                @endif
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                                <li class="px-3 py-2">
                                    <strong>{{ Auth::user()->name }}</strong><br>
                                    <small class="text-muted">{{ Auth::user()->email }}</small>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ url('pelanggan/profile') }}">
                                        <i class="bi bi-person me-2"></i> Profil Saya</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center dropdown-toggle" id="guestDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="rounded-circle border border-warning bg-light text-warning d-flex align-items-center justify-content-center"
                                    style="width:45px; height:45px; font-size:22px;">
                                    <i class="bi bi-person"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="guestDropdown">
                                <li><a class="dropdown-item" href="{{ route('login') }}">
                                        <i class="bi bi-box-arrow-in-right me-2"></i> Login</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('register') }}">
                                        <i class="bi bi-person-plus me-2"></i> Register</a>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    {{-- Footer tidak diubah --}}
    <footer class="mt-5 py-5">
        <div class="container">
            <div class="row text-center text-md-start align-items-start">

                <!-- Kolom 1 -->
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold text-warning">Dapur Afdhol</h5>
                    <p>Nikmati kemudahan pesan makanan langsung dari rumah. Cepat, higienis, dan enak!</p>
                </div>

                <!-- Kolom 2 -->
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold text-warning">Menu</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('pelanggan.home') }}">Home</a></li>
                        <li><a href="{{ route('pelanggan.menu') }}">Menu</a></li>
                        <li><a href="{{ route('pelanggan.riwayat') }}">Riwayat</a></li>
                        <li><a href="{{ route('pelanggan.tentang') }}">Tentang</a></li>
                        <li><a href="{{ route('pelanggan.kontak') }}">Kontak</a></li>
                    </ul>
                </div>

                <!-- Kolom 3 -->
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold text-warning">Kontak</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-envelope me-2"></i> dapurafdhol@gmail.com</li>
                        <li><i class="bi bi-telephone me-2"></i> +62 812-3456-7890</li>
                        <li><i class="bi bi-geo-alt me-2"></i> Jakarta, Indonesia</li>
                    </ul>
                </div>

                <!-- Kolom 4 -->
                <div class="col-md-3 mb-4 text-center text-md-start">
                    <h5 class="fw-bold text-warning mb-3">Ikuti Kami</h5>
                    <div class="d-flex justify-content-center justify-content-md-start gap-3 social-icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

            </div>

            <div class="text-center text-white-50 mt-4">
                © 2024 Dapur Afdhol. All rights reserved.
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
