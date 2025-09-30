@extends('layouts.admin.master')

@section('title', 'Laporan Menu')

@section('content')
<div class="content-padding">
    <h1 class="mb-4">Laporan Menu</h1>

    {{-- Filter Bulan & Tahun --}}
    <div class="admin-card mb-4">
        <form method="GET" action="{{ route('admin.laporan.index') }}" class="row g-2">
            <div class="col-md-3">
                <select name="bulan" class="form-select form-control-filter">
                    @for($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ $bulan == $i ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <select name="tahun" class="form-select form-control-filter">
                    @for($i = now()->year; $i >= 2020; $i--)
                        <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary-custom w-100" type="submit">
                    <i class="fas fa-filter me-1"></i> Filter
                </button>
            </div>
        </form>
    </div>

    {{-- Summary --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="mb-2">Total Pendapatan</h5>
                    <p class="fs-4 mb-0">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-info shadow-sm">
                <div class="card-body">
                    <h5 class="mb-2">Total Produk Terjual</h5>
                    <p class="fs-4 mb-0">{{ $totalProduk }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Detail Produk --}}
    <div class="admin-card">
        <h5 class="admin-card-header mb-3">Detail Produk</h5>

        <div class="table-responsive-custom">
            <table class="table table-borderless table-custom">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Terjual</th>
                        <th>Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($detailProduk as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['nama_produk'] }}</td>
                        <td>{{ $item['jumlah_terjual'] }}</td>
                        <td>Rp {{ number_format($item['pendapatan'], 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
          <div class="d-flex justify-content-center mt-3">
            {{ $detailProduk->withQueryString()->links('pagination::default') }}
        </div>
    </div>
</div>
@endsection
