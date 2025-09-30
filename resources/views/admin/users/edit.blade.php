@extends('layouts.admin.master')

@section('title', 'Edit Pengguna')

@section('content')
<div class="content-padding">
    <h1 class="mb-4">Edit Pengguna</h1>

    <div class="admin-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="admin-card-header mb-0" style="border-bottom: none;">Formulir Edit Pengguna</h5>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-custom">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="userName" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control form-control-filter" id="userName"
                       name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="userEmail" class="form-label">Email</label>
                <input type="email" class="form-control form-control-filter" id="userEmail"
                       name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="userPhone" class="form-label">No Telepon</label>
                <input type="text" class="form-control form-control-filter" id="userPhone"
                       name="no_telepon" value="{{ old('no_telepon', $user->no_telepon) }}" required>
            </div>

            <div class="mb-3">
                <label for="userRole" class="form-label">Peran</label>
                <select class="form-select form-control-filter" id="userRole" name="role" required>
                    <option value="pelanggan" @selected(old('role', $user->role) == 'pelanggan')>Pelanggan</option>
                    <option value="admin" @selected(old('role', $user->role) == 'admin')>Admin</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="userPassword" class="form-label">Password (kosongkan jika tidak ingin mengubah)</label>
                <input type="password" class="form-control form-control-filter" id="userPassword" name="password">
            </div>

            <button type="submit" class="btn btn-primary-custom mt-3">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
