@extends('layouts.pelanggan.master')

@section('title', 'Kontak - Dapur Afdhol')

@section('content')
@include('layouts.pelanggan.csskontak')

{{-- Header Halaman --}}
<section class="container py-5">
    <div class="row g-4">
        {{-- Info Kontak --}}
        <div class="col-md-5">
            <h2 class="section-title fw-bold mb-4">Hubungi Kami</h2>

            <div class="d-flex align-items-center mb-4">
                <div class="icon-box me-3"><i class="fas fa-map-marker-alt"></i></div>
                <div class="contact-info-text"><strong>Alamat:</strong><br>Jl. Kenanga No.88, Jakarta Selatan</div>
            </div>

            <div class="d-flex align-items-center mb-4">
                <div class="icon-box me-3"><i class="fas fa-phone-alt"></i></div>
                <div class="contact-info-text"><strong>Telepon:</strong><br>+62 812-3456-7890</div>
            </div>

            <div class="d-flex align-items-center mb-4">
                <div class="icon-box me-3"><i class="fas fa-envelope"></i></div>
                <div class="contact-info-text"><strong>Email:</strong><br>dapurafdhol@gmail.com</div>
            </div>

            <div class="d-flex align-items-center mb-4">
                <div class="icon-box me-3"><i class="fab fa-instagram"></i></div>
                <div class="contact-info-text"><strong>Instagram:</strong><br>@dapurafdhol</div>
            </div>
        </div>

        {{-- Form Kontak --}}
        <div class="col-md-7">
            <div class="contact-card">
                <h4 class="section-title fw-bold mb-4">Kirim Pesan ke Kami</h4>

                {{-- Pesan sukses --}}
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{-- Error --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pelanggan.kontak.kirim') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Alamat Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="subjek" value="{{ old('subjek') }}" class="form-control" placeholder="Subjek">
                    </div>
                    <div class="mb-3">
                        <textarea name="pesan" rows="4" class="form-control" placeholder="Tulis pesan Anda..." required>{{ old('pesan') }}</textarea>
                    </div>

                    {{-- Google reCAPTCHA --}}
                    <div class="mb-3">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                        @error('g-recaptcha-response')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-brand">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Load reCAPTCHA script --}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
