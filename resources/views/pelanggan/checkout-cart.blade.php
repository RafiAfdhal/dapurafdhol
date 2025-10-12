@extends('layouts.pelanggan.master')

@section('title', 'Checkout Keranjang')

@section('content')
    @include('layouts.pelanggan.csscheckout-cart')

    <div class="container py-4">
        <div class="row justify-content-center">

            <div class="col-md-5 mb-4">
                <div class="card shadow-lg border-0">

                    {{-- Header tetap dengan warna warning/kuning --}}
                    <div class="card-header bg-warning text-dark fw-bold border-0 rounded-top">
                        Ringkasan Pesanan
                    </div>

                    <div class="card-body p-4">
                        @php $total = 0; @endphp

                        {{-- Loop untuk setiap item di keranjang --}}
                        @foreach ($cart->items as $item)
                            @php
                                $subtotal = $item->jumlah * $item->harga;
                                $total += $subtotal;
                            @endphp

                            {{-- Setiap Item Pesanan: Menggunakan layout Grid yang Rapi --}}
                            <div class="row align-items-center mb-4 pb-3 border-bottom cart-item-row"
                                data-harga="{{ $item->harga }}">

                                {{-- Kolom Gambar (20% lebar) --}}
                                <div class="col-2 pe-0">
                                    @if ($item->menu->gambar)
                                        <img src="{{ asset('storage/' . $item->menu->gambar) }}"
                                            alt="{{ $item->menu->nama }}" class="img-fluid rounded-3"
                                            style="width: 100%; height: 60px; object-fit: cover;">
                                    @else
                                        <img src="https://via.placeholder.com/60x60" alt="{{ $item->menu->nama }}"
                                            class="img-fluid rounded-3"
                                            style="width: 100%; height: 60px; object-fit: cover;">
                                    @endif
                                </div>

                                {{-- Kolom Detail dan Quantity (55% lebar) --}}
                                <div class="col-7">
                                    <h6 class="mb-1 fw-bold text-truncate" title="{{ $item->menu->nama }}">
                                        {{ $item->menu->nama }}</h6>
                                    <small class="text-muted d-block mb-2 item-price">
                                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                                    </small>

                                    {{-- Kontrol Kuantitas Lebih Rapi --}}
                                    <form action="{{ route('pelanggan.cart.update', $item->id) }}" method="POST"
                                        class="d-flex align-items-center quantity-form" data-item-id="{{ $item->id }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="input-group input-group-sm" style="width: 110px;">
                                            {{-- Tombol Kurang --}}
                                            <button type="button" class="btn btn-outline-secondary minus-btn"
                                                @if ($item->jumlah <= 1) disabled @endif>
                                                <i class="bi bi-dash"></i>
                                            </button>

                                            {{-- Input Jumlah --}}
                                            <input type="number" name="jumlah" value="{{ $item->jumlah }}" min="1"
                                                max="{{ $item->menu->stok }}"
                                                class="form-control text-center bg-light qty-input" readonly>

                                            {{-- Tombol Tambah --}}
                                            <button type="button" class="btn btn-outline-secondary plus-btn"
                                                @if ($item->jumlah >= $item->menu->stok) disabled @endif>
                                                <i class="bi bi-plus"></i>
                                            </button>

                                            <input type="hidden" name="action" value="manual">
                                        </div>
                                    </form>
                                    <small class="text-success d-block mt-1" style="font-size: 0.75rem;">
                                        Stok: {{ $item->menu->stok }}
                                    </small>
                                </div>

                                {{-- Kolom Subtotal (25% lebar) --}}
                                <div class="col-3 text-end">
                                    <div class="fw-bold text-warning subtotal-text">
                                        Rp {{ number_format($subtotal, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- Garis Pemisah --}}
                        <hr class="my-3 border-secondary">

                        <div class="d-flex justify-content-between fw-bold fs-5 mt-4">
                            <span>TOTAL AKHIR:</span>
                            {{-- Total tetap dengan warna success/hijau --}}
                            <span class="text-success total-text">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card shadow-lg">
                    <div class="card-header bg-warning text-dark fw-bold">
                        Formulir Checkout
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pelanggan.checkout.cart.process') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Penerima</label>
                                <input type="text" name="nama_penerima" class="form-control"
                                    value="{{ old('nama_penerima', auth()->user()->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No. Telepon</label>
                                <input type="text" name="no_telepon" class="form-control"
                                    value="{{ old('no_telepon', auth()->user()->no_telepon) }}" required>
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
                            <a href="{{ route('pelanggan.cart.show') }}" class="btn btn-outline-dark w-100 mt-2">
                                <i class="bi bi-arrow-left"></i> Kembali ke Keranjang
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fungsi utilitas
            function parseRupiah(text) {
                // Menghapus semua non-digit kecuali koma atau titik jika ada
                return parseInt(text.replace(/[Rp.\s]/g, '')) || 0;
            }

            function formatRupiah(angka) {
                return "Rp " + angka.toLocaleString('id-ID');
            }

            // Hitung ulang total keseluruhan
            function updateTotal() {
                let total = 0;
                document.querySelectorAll(".subtotal-text").forEach(el => {
                    total += parseRupiah(el.textContent);
                });

                const totalElem = document.querySelector(".total-text");
                if (totalElem) totalElem.textContent = formatRupiah(total);
            }

            // Fungsi AJAX untuk update keranjang
            async function updateCartBackend(itemId, newQuantity, formElement) {
                const url = formElement.getAttribute('action');
                const formData = new FormData();

                // Tambahkan data yang dibutuhkan
                formData.append('_token', formElement.querySelector('[name=_token]').value);
                formData.append('_method', 'PUT'); // Untuk method spoofing
                formData.append('jumlah', newQuantity);

                try {
                    const response = await fetch(url, {
                        method: 'POST', // Kirim sebagai POST, tapi pakai _method=PUT
                        body: formData,
                    });

                    if (!response.ok) {
                        const errorData = await response.json();
                        throw new Error(errorData.message || 'Gagal memperbarui keranjang.');
                    }
                    console.log(`✅ Item ${itemId} updated to ${newQuantity}`);
                } catch (error) {
                    console.error('❌ Error:', error);
                    alert('Gagal memperbarui pesanan. Silakan coba lagi.');
                    // Jika gagal, refresh halaman untuk sinkronisasi ulang
                    window.location.reload();
                }
            }


            // Attach event listeners ke semua tombol plus/minus
            document.querySelectorAll(".quantity-form").forEach(form => {
                const minusBtn = form.querySelector(".minus-btn");
                const plusBtn = form.querySelector(".plus-btn");
                const qtyInput = form.querySelector(".qty-input");

                // Cari elemen terkait
                const itemRow = form.closest('.cart-item-row');
                const subtotalElem = itemRow ? itemRow.querySelector('.subtotal-text') : null;
                const hargaPerPorsi = itemRow ? parseInt(itemRow.getAttribute('data-harga')) : 0;

                // ➕ Tambah porsi
                plusBtn.addEventListener("click", function() {
                    let current = parseInt(qtyInput.value) || 0;
                    const max = parseInt(qtyInput.getAttribute("max")) || 9999;

                    if (current < max) {
                        const newQuantity = current + 1;
                        qtyInput.value = newQuantity;

                        // Update UI (Subtotal & Total)
                        if (subtotalElem) {
                            subtotalElem.textContent = formatRupiah(hargaPerPorsi * newQuantity);
                        }
                        updateTotal();

                        // Kirim ke backend (Asynchronous)
                        updateCartBackend(form.getAttribute('data-item-id'), newQuantity, form);

                        // Disable/Enable tombol
                        if (newQuantity >= max) plusBtn.disabled = true;
                        minusBtn.disabled = false;
                    }
                });

                // ➖ Kurangi porsi
                minusBtn.addEventListener("click", function() {
                    let current = parseInt(qtyInput.value) || 0;
                    const min = parseInt(qtyInput.getAttribute("min")) || 1;

                    if (current > min) {
                        const newQuantity = current - 1;
                        qtyInput.value = newQuantity;

                        // Update UI (Subtotal & Total)
                        if (subtotalElem) {
                            subtotalElem.textContent = formatRupiah(hargaPerPorsi * newQuantity);
                        }
                        updateTotal();

                        // Kirim ke backend (Asynchronous)
                        updateCartBackend(form.getAttribute('data-item-id'), newQuantity, form);

                        // Disable/Enable tombol
                        if (newQuantity <= min) minusBtn.disabled = true;
                        plusBtn.disabled = false;
                    }
                });

                // Sinkronisasi status tombol saat load
                if (parseInt(qtyInput.value) <= parseInt(qtyInput.getAttribute("min"))) {
                    minusBtn.disabled = true;
                }
                if (parseInt(qtyInput.value) >= parseInt(qtyInput.getAttribute("max"))) {
                    plusBtn.disabled = true;
                }
            });
        });
    </script>
@endsection
