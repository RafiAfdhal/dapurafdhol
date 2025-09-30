@extends('layouts.admin.master')

@section('title', 'Tambah Menu Baru')

@section('content')
<div class="content-padding">
    <h1 class="mb-4">Tambah Menu</h1>
    
    <div class="admin-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="admin-card-header mb-0" style="border-bottom: none;">Formulir Tambah Menu</h5>
            <a href="{{ route('admin.menu.index') }}" class="btn btn-outline-custom">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <form method="POST" action="{{ route('admin.menu.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Menu</label>
                <input type="text" class="form-control form-control-filter" id="nama" name="nama" 
                       value="{{ old('nama') }}" required>
                @error('nama') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select class="form-select form-control-filter" id="kategori_id" name="kategori_id" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control form-control-filter" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                @error('deskripsi') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control form-control-filter" id="harga" name="harga" 
                       value="{{ old('harga') }}" required>
                @error('harga') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control form-control-filter" id="stok" name="stok" 
                       value="{{ old('stok') }}" required>
                @error('stok') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control form-control-filter" id="gambar" name="gambar">
                @error('gambar') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary-custom mt-3">Simpan Menu</button>
        </form>
    </div>
</div>
@endsection
