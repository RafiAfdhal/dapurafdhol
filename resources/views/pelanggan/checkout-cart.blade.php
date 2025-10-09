@extends('layouts.pelanggan.master')

@section('title', 'Checkout Keranjang')

@section('content')
    @include('layouts.pelanggan.csscheckout-cart')

    <div class="container py-4">
        <div class="row justify-content-center">
            <!-- Ringkasan Pesanan -->
            <div class="col-md-5 mb-4">
                <div class="card shadow-sm checkout-menu-card">
                    <div class="card-header bg-warning text-dark fw-bold">
                        Ringkasan Pesanan
                    </div>
                    <div class="card-body">
                        @php $total = 0; @endphp
                        @foreach ($cart->items as $item)
                            @php
                                $subtotal = $item->jumlah * $item->harga;
                                $total += $subtotal;
                            @endphp
                            <div class="d-flex align-items-center mb-3 border-bottom pb-2">
                                <!-- Gambar menu -->
                                <div class="me-3">
                                    @if ($item->menu->gambar)
                                        <img src="{{ asset('storage/' . $item->menu->gambar) }}" alt="{{ $item->menu->nama }}"
                                            class="rounded" width="150" height="80">
                                    @else
                                        <img src="https://via.placeholder.com/150x80" alt="{{ $item->menu->nama }}"
                                            class="rounded checkout-img">
                                    @endif
                                </div>

                                <!-- Detail menu -->
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ $item->menu->nama }}</h6>
                                    <small class="text-muted">
                                        Rp {{ number_format($item->harga, 0, ',', '.') }} / porsi
                                    </small>

                                    <!-- 🔢 Update jumlah -->
                                    <form action="{{ route('pelanggan.cart.update', $item->id) }}" method="POST"
                                        class="d-flex align-items-center mt-2">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" name="action" value="decrease"
                                            class="btn btn-outline-secondary btn-sm">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <input type="number" name="jumlah" value="{{ $item->jumlah }}" min="1"
                                            max="{{ $item->menu->stok }}"
                                            class="form-control form-control-sm text-center mx-2" style="width: 60px;"
                                            readonly>
                                        <button type="submit" name="action" value="increase"
                                            class="btn btn-outline-secondary btn-sm">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </form>
                                </div>

                                <!-- Subtotal -->
                                <div class="fw-bold text-warning ms-2">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </div>
                            </div>
                        @endforeach

                        <!-- Total -->
                        <div class="d-flex justify-content-between fw-bold fs-5 mt-3">
                            <span>Total:</span>
                            <span class="text-success">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Checkout -->
            <div class="col-md-7">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark fw-bold">
                        Formulir Checkout
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pelanggan.checkout.cart.process') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Penerima</label>
                                <input type="text" name="nama_penerima" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No. Telepon</label>
                                <input type="text" name="no_telepon" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="alamat" rows="3" class="form-control" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Catatan</label>
                                <textarea name="catatan" rows="2" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Metode Pembayaran</label>
                                <select name="metode_pembayaran" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="cash">Cash</option>
                                    <option value="gopay">GoPay</option>
                                    <option value="ovo">OVO</option>
                                    <option value="dana">Dana</option>
                                </select>
                            </div>

                            <!-- Pilihan penagtaran -->
                            <div class="mb-3">
                                <label class="form-label">Metode Pengantaran</label>
                                <select name="metode_pengantaran" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="gosend">GoSend</option>
                                    <option value="grabexpress">Grab Express</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-warning w-100 fw-bold">
                                <i class="bi bi-bag-check"></i> Buat Pesanan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2500,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
@endsection
