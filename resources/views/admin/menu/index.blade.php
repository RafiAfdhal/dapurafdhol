@extends('layouts.admin.master')

@section('title', 'Manajemen Menu')

@section('content')
    <div class="content-padding">
        <h1 class="mb-4">Manajemen Menu</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="admin-card-header mb-0" style="border-bottom: none;">Daftar Menu</h5>
                <div class="d-flex align-items-center gap-2">
                    <!-- Form filter -->
                    <form action="{{ route('admin.menu.index') }}" method="GET" class="d-flex gap-2">
                        <select name="kategori_id" class="form-select form-control-filter" style="width: 150px;">
                            <option value="">Semua Kategori</option>
                            @foreach ($kategori as $cat)
                                <option value="{{ $cat->id }}" @selected(request('kategori') == $cat->id)>
                                    {{ $cat->nama }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary-custom btn-sm">
                            <i class="fas fa-filter me-1"></i>Filter
                        </button>
                    </form>
                    <a href="{{ route('admin.menu.create') }}" class="btn btn-primary-custom btn-sm">
                        <i class="fas fa-plus me-1"></i> Tambah Menu
                    </a>
                </div>
            </div>

            <div class="table-responsive-custom">
                <table class="table table-borderless table-custom">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($menus as $key => $menu)
                            <tr>
                                <td>{{ $menus->firstItem() + $key }}</td>
                                <td>
                                    @if ($menu->gambar)
                                        <img src="{{ Storage::url($menu->gambar) }}" alt="{{ $menu->nama }}"
                                            class="menu-thumbnail">
                                    @else
                                        <img src="https://placehold.co/60x60/888888/ffffff?text=No+Img"
                                            class="menu-thumbnail">
                                    @endif
                                </td>
                                <td>{{ $menu->nama }}</td>
                                <td>{{ $menu->category->nama ?? '-' }}</td>
                                <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                                <td>{{ $menu->stok }}</td>
                                <td>
                                    @if ($menu->stok > 0)
                                        <span class="badge bg-success">Tersedia</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Tersedia</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.menu.show', $menu->id) }}" class="btn btn-sm btn-info me-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.menu.edit', $menu->id) }}"
                                        class="btn btn-sm btn-outline-secondary me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">Tidak ada menu ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $menus->withQueryString()->links('pagination::default') }}
            </div>

        </div>
    </div>
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
