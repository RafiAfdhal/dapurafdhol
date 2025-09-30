<div class="sidebar" id="sidebar">
    <div class="sidebar-header text-center">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Dapur Afdhol Logo" class="sidebar-logo">
        </a>
    </div>
    <ul class="list-group sidebar-menu">
        <a href="{{ route('admin.dashboard') }}"
            class="list-group-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.categories.index') }}"
            class="list-group-item {{ request()->is('admin/categories*') ? 'active' : '' }}">
            <i class="fas fa-tags"></i> <span>Manajemen Kategori</span>

        <a href="{{ route('admin.menu.index') }}"
            class="list-group-item {{ request()->is('admin/menu*') ? 'active' : '' }}">
            <i class="fas fa-utensils"></i> <span>Manajemen Menu</span>
        </a>

        <a href="{{ route('admin.orders.index') }}"
            class="list-group-item {{ request()->is('admin/orders*') ? 'active' : '' }}">
            <i class="fas fa-clipboard-list"></i> <span>Manajemen Pesanan</span>
        </a>

        <a href="{{ route('admin.users.index') }}"
            class="list-group-item {{ request()->is('admin/users*') ? 'active' : '' }}">
            <i class="fas fa-users"></i> <span>Manajemen Pengguna</span>
        </a>

        <a href="{{ route('admin.reviews.index') }}"
            class="list-group-item {{ request()->is('admin/reviews*') ? 'active' : '' }}">
            <i class="fas fa-star"></i> <span>Ulasan Pelanggan</span>
        </a>

        <a href="{{ route('admin.laporan.index') }}"
            class="list-group-item {{ request()->is('admin/laporan*') ? 'active' : '' }}">
            <i class="fas fa-file-alt"></i> <span>Laporan</span>
        </a>
    </ul>
</div>