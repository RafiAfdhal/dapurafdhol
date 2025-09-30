@extends('layouts.admin.master')

@section('title', 'Manajemen Pengguna')

@section('content')
<div class="content-padding">
    <h1 class="mb-4">Manajemen Pengguna</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="admin-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="admin-card-header mb-0" style="border-bottom: none;">Daftar Pengguna</h5>
            <div class="d-flex align-items-center gap-2">
                {{-- Search + Filter --}}
                <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex">
                    <input type="text" id="searchUser" name="search" class="form-control-filter"
                        placeholder="Cari pengguna..." value="{{ request('search') }}" style="width: 200px;">

                    <select id="filterRole" name="role" class="form-select form-control-filter"
                        style="width: 150px; margin-left: 10px;">
                        <option value="">Semua Peran</option>
                        @foreach($roles as $role)
                        <option value="{{ $role }}" @selected(request('role')==$role)>
                            {{ ucfirst($role) }}
                        </option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary-custom btn-sm ms-2">
                        <i class="fas fa-filter"></i>
                    </button>
                </form>

                {{-- Tambah Pengguna --}}
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary-custom btn-sm">
                    <i class="fas fa-plus me-1"></i> Tambah Pengguna
                </a>
            </div>
        </div>

        {{-- Table User --}}
        <div class="table-responsive-custom">
            <table class="table table-borderless table-custom">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Peran</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $key => $user)
                    <tr>
                        <td>{{ $users->firstItem() + $key }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_telepon }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-secondary me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            {{-- Tombol hapus hanya muncul jika bukan akun sendiri --}}
                            @if(auth()->id() !== $user->id)
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Tidak ada pengguna ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $users->onEachSide(1)->links('pagination::default') }}
        </div>
    </div>
</div>
@endsection