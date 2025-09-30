@extends('layouts.admin.master')

@section('content')
<div class="container mt-4">
    <h3>Detail Pesan</h3>
    <div class="card shadow mt-3">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $pesan->nama }}</p>
            <p><strong>Email:</strong> {{ $pesan->email }}</p>
            <p><strong>Subjek:</strong> {{ $pesan->subjek }}</p>
            <p><strong>Pesan:</strong> <br> {{ $pesan->pesan }}</p>
            <p>
                <strong>Status:</strong> 
                @if($pesan->is_read)
                    <span class="badge bg-success">Sudah Dibaca</span>
                @else
                    <span class="badge bg-danger">Belum Dibaca</span>
                @endif
            </p>
        </div>
    </div>
    <a href="{{ route('admin.pesan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
