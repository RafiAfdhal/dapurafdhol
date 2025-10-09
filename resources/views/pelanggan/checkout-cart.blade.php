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
                                        class="d-flex align-items-center mt-2 quantity-form">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" class="btn btn-outline-secondary btn-sm minus-btn">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <input type="number" name="jumlah" value="{{ $item->jumlah }}" min="1"
                                            max="{{ $item->menu->stok }}"
                                            class="form-control form-control-sm text-center mx-2 qty-input"
                                            style="width: 60px;" readonly>
                                        <button type="button" class="btn btn-outline-secondary btn-sm plus-btn">
                                            <i class="bi bi-plus"></i>
                                        </button>

                                        <!-- Hidden inputs buat sinkron jumlah -->
                                        <input type="hidden" name="action" value="manual">
                                    </form>
                                </div>

                                <!-- Subtotal -->
                                <div class="fw-bold text-warning ms-2 subtotal-text">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </div>
                            </div>
                        @endforeach

                        <!-- Total -->
                        <div class="d-flex justify-content-between fw-bold fs-5 mt-3">
                            <span>Total:</span>
                            <span class="text-success total-text">Rp {{ number_format($total, 0, ',', '.') }}</span>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 💡 SCRIPT TAMBAH-KURANG JUMLAH --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const forms = document.querySelectorAll(".quantity-form");

            function parseRupiah(text) {
                return parseInt(text.replace(/\D/g, '')) || 0;
            }

            function formatRupiah(angka) {
                return "Rp " + angka.toLocaleString('id-ID');
            }

            // 🔢 Hitung ulang total keseluruhan
            function updateTotal() {
                let total = 0;
                document.querySelectorAll(".subtotal-text").forEach(el => {
                    total += parseRupiah(el.textContent);
                });

                const totalElem = document.querySelector(".total-text"); // pastikan elemen total punya class ini
                if (totalElem) totalElem.textContent = formatRupiah(total);
            }

            // 📨 Kirim ke backend tanpa reload
            async function updateCart(form, action) {
                const url = form.getAttribute('action');
                const formData = new FormData(form);
                formData.set('action', action);

                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': form.querySelector('[name=_token]').value,
                            'X-HTTP-Method-Override': 'PUT',
                        },
                        body: formData,
                    });

                    if (!response.ok) throw new Error('Gagal memperbarui keranjang');
                    console.log('✅ Jumlah berhasil diupdate');
                } catch (error) {
                    console.error('❌ Error:', error);
                }
            }

            forms.forEach(form => {
                const minusBtn = form.querySelector(".minus-btn");
                const plusBtn = form.querySelector(".plus-btn");
                const qtyInput = form.querySelector(".qty-input");

                const flexGrow = form.closest('.flex-grow-1');
                const priceElem = flexGrow ? flexGrow.querySelector('small.text-muted') : null;
                const subtotalElem = flexGrow ? flexGrow.nextElementSibling : null;
                const hargaPerPorsi = priceElem ? parseRupiah(priceElem.innerText) : 0;

                // ➕ Tambah porsi
                plusBtn.addEventListener("click", async function() {
                    let current = parseInt(qtyInput.value) || 0;
                    const max = parseInt(qtyInput.getAttribute("max")) || 9999;
                    if (current < max) {
                        qtyInput.value = current + 1;

                        // Update subtotal tampilan
                        if (subtotalElem) {
                            const newSubtotal = hargaPerPorsi * (current + 1);
                            subtotalElem.textContent = formatRupiah(newSubtotal);
                        }

                        // Update total keseluruhan
                        updateTotal();

                        // Kirim ke backend
                        await updateCart(form, 'increase');
                    }
                });

                // ➖ Kurangi porsi
                minusBtn.addEventListener("click", async function() {
                    let current = parseInt(qtyInput.value) || 0;
                    const min = parseInt(qtyInput.getAttribute("min")) || 1;
                    if (current > min) {
                        qtyInput.value = current - 1;

                        // Update subtotal tampilan
                        if (subtotalElem) {
                            const newSubtotal = hargaPerPorsi * (current - 1);
                            subtotalElem.textContent = formatRupiah(newSubtotal);
                        }

                        // Update total keseluruhan
                        updateTotal();

                        // Kirim ke backend
                        await updateCart(form, 'decrease');
                    }
                });
            });
        });
    </script>

@endsection
