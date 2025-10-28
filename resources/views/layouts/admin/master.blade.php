<!DOCTYPE html>
<html lang="id">

<head>
    @include('layouts.admin.head')
    @include('layouts.admin.style')
</head>

<body>

    {{-- Sidebar --}}
    @include('layouts.admin.sidebar')

    {{-- Main Content --}}
    <div id="main-content" class="main-content">
        {{-- Top Navbar --}}
        <nav class="admin-navbar d-flex justify-content-between align-items-center px-3 py-2" id="admin-navbar">
            <div class="d-flex align-items-center">
                <button class="toggle-btn me-3" id="sidebar-toggle"><i class="fas fa-bars"></i></button>
                <h4 class="m-0 admin-panel-title d-none d-md-block">@yield('title', 'Dashboard')</h4>
            </div>

            <div class="d-flex align-items-center gap-3">
                {{-- Notifikasi Pesan --}}
                @php
                    use App\Models\PesanKontak;
                    $unreadCount = PesanKontak::where('is_read', false)->count();
                @endphp

                <a href="{{ route('admin.pesan.index') }}" class="nav-link position-relative">
                    <i class="fas fa-envelope"></i>
                    @if ($unreadCount > 0)
                        <span class="badge bg-info position-absolute top-0 start-100 translate-middle">
                            {{ $unreadCount }}
                        </span>
                    @endif
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (Auth::user()->profile_photo_path)
                                {{-- Jika ada foto --}}
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="Avatar"
                                    class="rounded-circle border" width="38" height="38"
                                    style="object-fit: cover; margin-right: 8px;">
                            @else
                                {{-- Jika tidak ada foto, tampilkan inisial --}}
                                <div class="rounded-circle border bg-secondary text-white d-flex align-items-center justify-content-center"
                                    style="width:38px; height:38px; font-weight:bold; margin-right: 8px;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                    <i class="bi bi-person-circle me-2"></i> Profil
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- Konten Halaman --}}
        <div class="content-padding">
            @yield('content')
        </div>
    </div>

    @include('layouts.admin.script')
</body>

</html>
