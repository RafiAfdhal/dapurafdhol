@extends('layouts.admin.master')

@section('title', 'Tambah Pengguna - Dapur Afdhol Admin')

@section('content')
<div class="content-padding">
    <h1 class="mb-4">Tambah Pengguna Baru</h1>
    
    <div class="admin-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="admin-card-header mb-0" style="border-bottom: none;">Formulir Pengguna</h5>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-custom">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <form id="userForm" method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="mb-3">
                <label for="userName" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control form-control-filter" id="userName" name="name"
                       value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="userEmail" class="form-label">Email</label>
                <input type="email" class="form-control form-control-filter" id="userEmail" name="email"
                       value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="userPhone" class="form-label">No Telepon</label>
                <input type="text" class="form-control form-control-filter" id="userPhone" name="no_telepon"
                       value="{{ old('no_telepon') }}" required>
            </div>

            <div class="mb-3">
                <label for="userRole" class="form-label">Peran</label>
                <select class="form-select form-control-filter" id="userRole" name="role" required>
                    <option value="pelanggan" @selected(old('role') == 'pelanggan')>Pelanggan</option>
                    <option value="admin" @selected(old('role') == 'admin')>Admin</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="userPassword" class="form-label">Password</label>
                <input type="password" class="form-control form-control-filter" id="userPassword" name="password"
                       required>
            </div>

            <button type="submit" class="btn btn-primary-custom mt-3">Simpan Pengguna</button>
        </form>
    </div>
</div>
@endsection
