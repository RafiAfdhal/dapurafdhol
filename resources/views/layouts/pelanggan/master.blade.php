<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Afdhol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body class="d-flex flex-column min-vh-100">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-white px-4 py-3 sticky-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ url('pelanggan/home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Dapur Afdhol">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mb-2 mb-lg-0 gap-3 mx-auto">
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

                <div class="d-flex align-items-center gap-3">
                    <a href="{{ url('pelanggan/cart') }}" class="text-decoration-none">
                        <i class="bi bi-cart cart-icon fs-5"></i>
                    </a>
                    {{-- Avatar / Login --}}
                    @auth
                        {{-- Dropdown User --}}
                        <div class="dropdown">
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
                                <li>
                                    <a class="dropdown-item" href="{{ url('pelanggan/profile') }}">
                                        <i class="bi bi-person me-2"></i> Profil Saya
                                    </a>
                                </li>
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
                        {{-- Dropdown Guest (Login / Register) --}}
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center dropdown-toggle" id="guestDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">

                                {{-- Ikon bulat mirip avatar --}}
                                <div class="rounded-circle border border-warning bg-light text-warning d-flex align-items-center justify-content-center"
                                    style="width:45px; height:45px; font-size:22px;">
                                    <i class="bi bi-person"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="guestDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        <i class="bi bi-box-arrow-in-right me-2"></i> Login
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('register') }}">
                                        <i class="bi bi-person-plus me-2"></i> Register
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
             </nav>

    {{-- Main Content --}}
    <main class="flex-grow-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Dapur Afdhol</h5>
                    <p class="small">Nikmati kemudahan pesan makanan langsung dari rumah. Cepat, higienis, dan enak!
                    </p>
                </div>
                <div class="col-md-2">
                    <h6>Menu</h6>
                    <ul class="list-unstyled small">
                        <li><a href="{{ url('pelanggan/home') }}" class="text-decoration-none">Home</a></li>
                        <li><a href="{{ url('pelanggan/menu') }}" class="text-decoration-none">Menu</a></li>
                        <li><a href="{{ url('pelanggan/riwayat') }}" class="text-decoration-none">Riwayat</a></li>
                        <li><a href="{{ url('pelanggan/tentang') }}" class="text-decoration-none">Tentang</a></li>
                        <li><a href="{{ url('pelanggan/kontak') }}" class="text-decoration-none">Kontak</a></li>
                    </ul>

                </div>
                <div class="col-md-3">
                    <h6>Kontak</h6>
                    <p class="small mb-1"><i class="fas fa-envelope me-2"></i>dapurafdhol@gmail.com</p>
                    <p class="small mb-1"><i class="fas fa-phone me-2"></i>+62 812-3456-7890</p>
                    <p class="small"><i class="fas fa-map-marker-alt me-2"></i>Jakarta, Indonesia</p>
                </div>
                <div class="col-md-3">
                    <h6>Ikuti Kami</h6>
                    <div class="d-flex gap-3 fs-5">
                        <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center text-white-50 mt-4 small">&copy; 2024 Dapur Afdhol. All rights reserved.</div>
        </div>
    </footer>
    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>

</html>
