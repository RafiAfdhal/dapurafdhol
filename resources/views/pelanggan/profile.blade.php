@extends('layouts.pelanggan.master')

@section('title', 'Profil Saya - Dapur Afdhol')

@section('content')
@include('layouts.pelanggan.cssprofile')
<div class="container py-5">
    {{-- Alert Sukses --}}
    @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-lg mx-auto" style="max-width: 700px; border-radius: 20px;">
        <div class="card-body text-center">

            {{-- Avatar --}}
            <div class="mb-4">
                @if($user->profile_photo_path)
                    <img src="{{ asset('storage/'.$user->profile_photo_path) }}" 
                         alt="Avatar" class="rounded-circle shadow" 
                         style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #f8b400;">
                @else
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-warning text-white fw-bold mx-auto"
                         style="width: 150px; height: 150px; font-size: 3rem; border: 4px solid #f8b400;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                @endif

                <div class="mt-3">
                    <input type="file" id="fileInput" name="profile_photo" accept="image/*" class="d-none" form="profileForm"/>
                    <button type="button" onclick="document.getElementById('fileInput').click()" 
                            class="btn btn-outline-warning btn-sm rounded-pill px-4">
                        <i class="fas fa-camera"></i> Ganti Foto
                    </button>

                    {{-- Hapus Foto --}}
                    @if($user->profile_photo_path)
                    <form action="{{ route('pelanggan.profile.deletePhoto') }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-4 ms-2"
                                onclick="return confirm('Yakin ingin menghapus foto profil?');">
                            <i class="fas fa-trash-alt"></i> Hapus Foto
                        </button>
                    </form>
                    @endif
                </div>
            </div>

            {{-- FORM PROFIL --}}
            <form id="profileForm" action="{{ route('pelanggan.profile.update') }}" method="POST" enctype="multipart/form-data" class="text-start">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama Pengguna</label>
                    <input type="text" class="form-control rounded-pill" id="name" name="name" 
                           value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control rounded-pill" id="email" name="email" 
                           value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="no_telepon" class="form-label fw-bold">No Telepon</label>
                    <input type="text" class="form-control rounded-pill" id="no_telepon" name="no_telepon" 
                           value="{{ old('no_telepon', $user->no_telepon) }}" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-bold">Sandi (opsional)</label>
                    <input type="password" class="form-control rounded-pill" id="password" name="password" placeholder="Biarkan kosong jika tidak ingin ubah">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-warning rounded-pill fw-bold">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Social Media --}}
    <div class="text-center mt-5">
        <h5 class="fw-bold mb-3">Terhubung dengan Kami</h5>
        <div class="d-flex justify-content-center gap-3 fs-3">
            <a href="https://www.instagram.com/dapurafdhol" target="_blank" class="text-danger"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com/dapurafdhol" target="_blank" class="text-primary"><i class="fab fa-facebook"></i></a>
            <a href="https://www.tiktok.com/@dapurafdhol" target="_blank" class="text-dark"><i class="fab fa-tiktok"></i></a>
        </div>
    </div>
</div>
@endsection
