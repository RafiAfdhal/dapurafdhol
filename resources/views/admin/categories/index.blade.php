@extends('layouts.admin.master')

@section('title', 'Manajemen Kategori')

@section('content')
<div class="content-padding">
    <h1 class="mb-4">Manajemen Kategori</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="admin-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="admin-card-header mb-0" style="border-bottom: none;">Daftar Kategori</h5>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary-custom btn-sm">
                    <i class="fas fa-plus me-1"></i> Tambah Kategori
                </a>
            </div>
        </div>

        <div class="table-responsive-custom">
            <table class="table table-borderless table-custom">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $key => $category)
                    <tr>
                        <td>{{ $categories->firstItem() + $key }}</td>
                        <td>{{ $category->nama }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-secondary me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
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
                        <td colspan="3" class="text-center py-4">Tidak ada kategori ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
          <div class="d-flex justify-content-center mt-3">
       {{ $categories->withQueryString()->links('pagination::default') }}
        </div>
    </div>
</div>
@endsection