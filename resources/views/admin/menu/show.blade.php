@extends('layouts.admin.master')

@section('title', 'Detail Menu')

@section('content')
<div class="content-padding">
    <h1 class="mb-4">Detail Menu</h1>

    <div class="admin-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="admin-card-header mb-0" style="border-bottom: none;">Informasi Menu</h5>
            <a href="{{ route('admin.menu.index') }}" class="btn btn-outline-custom">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="row">
            <div class="col-md-4 text-center">
                @if($menu->gambar)
                <img src="{{ Storage::url($menu->gambar) }}" alt="{{ $menu->nama }}" class="img-fluid rounded mb-3">
                @else
                <img src="https://placehold.co/300x200/888888/ffffff?text=No+Image" class="img-fluid rounded mb-3">
                @endif
            </div>
            <div class="col-md-8">
                <table class="table table-borderless">
                    <tr>
                        <th>Nama Menu</th>
                        <td>{{ $menu->nama }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>{{ $menu->category->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $menu->deskripsi ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>{{ $menu->stok }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($menu->stok > 0)
                            <span class="badge bg-success">Tersedia</span>
                            @else
                            <span class="badge bg-secondary">Tidak Tersedia</span>
                            @endif
                        </td>
                    </tr>

                </table>
                <div class="mt-3">
                    <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-primary-custom me-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus menu ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection