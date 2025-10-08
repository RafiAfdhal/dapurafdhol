@extends('layouts.admin.master')

@section('title', 'Daftar Pesan Kontak')

@section('content')
<div class="content-padding">
    <h1 class="mb-4">Daftar Pesan Kontak</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="admin-card">
        <div class="table-responsive-custom">
            <table class="table table-borderless table-custom table-hover">
                <thead>
                    <tr class="text-center">
                        <th style="width: 5%">No</th>
                        <th style="width: 20%">Nama</th>
                        <th style="width: 20%">Email</th>
                        <th style="width: 25%">Subjek</th>
                        <th style="width: 15%">Status</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesan as $p)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->subjek }}</td>
                            <td class="text-center">
                                @if($p->is_read)
                                    <span class="badge bg-success">Sudah Dibaca</span>
                                @else
                                    <span class="badge bg-danger">Belum Dibaca</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.pesan.show', $p->id) }}" 
                                   class="btn btn-sm btn-info me-1">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.pesan.destroy', $p->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
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
                            <td colspan="6" class="text-center py-4">Tidak ada pesan ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

       
    </div>
</div>
@endsection
