@extends('layouts.pelanggan.master')

@section('content')
 @include('layouts.pelanggan.csshome')
    

<section class="container py-5 hero-section flex-grow-1 d-flex align-items-center">
    <div class="row align-items-center">
        <div class="col-md-5">
            <img src="{{ asset('img/mie ayam jamur.jpg') }}" alt="Makanan 1" class="img-fluid rounded-4 shadow">
        </div>
        <div class="col-md-7">
            <h1 class="fw-bold mb-3">Spesial Makanan <br>Indonesia</h1>
            <p class="mb-4">Mulailah hari dengan lezat dan sehat. Temukan makanan kesukaan dan rasakan kelezatannya. Kami akan mengantarkan makanan lezat ke depan pintu Anda setiap hari.</p>
            <div class="row g-3 mb-4">
                <div class="col-6 col-md-4">
                    <img src="{{ asset('img/nasi goreng special.jpg') }}" alt="foto makanan" class="img-fluid rounded-4 shadow">
                </div>
                <div class="col-6 col-md-4">
                    <img src="{{ asset('img/sate ayam.jpg') }}" alt="foto makanan" class="img-fluid rounded-4 shadow">
                </div>
            </div>
            <div class="d-flex gap-3">
                <a href="{{ url('pelanggan/menu') }}" class="btn btn-outline-custom px-4 py-2 rounded-pill">Lihat Lebih Banyak Menu</a>
            </div>
        </div>
    </div>
</section>
@endsection
