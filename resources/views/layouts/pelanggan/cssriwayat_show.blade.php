<style>
    .navbar {
        background-color: rgba(255, 255, 255, 0.9);
        /* Sedikit lebih transparan */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        /* Bayangan lebih halus */
        backdrop-filter: blur(8px);
        /* Efek frosted glass */
        -webkit-backdrop-filter: blur(8px);
        /* Kompatibilitas Safari */
        border-bottom: 1px solid rgba(255, 179, 0, 0.2);
        /* Garis tipis di bawah navbar */
        z-index: 1030;
        /* Pastikan navbar di atas konten lain */
    }

    .navbar-brand img {
        height: 70px;
        /* Logo diperkecil */
        transition: transform 0.3s ease;
        /* Transisi untuk efek hover logo */
    }

    .navbar-brand img:hover {
        transform: scale(1.05);
        /* Efek zoom saat hover logo */
    }

    .nav-link {
        color: #3E2723 !important;
        font-weight: 500;
        /* Medium weight */
        padding: 10px 18px !important;
        /* Padding yang konsisten */
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: #FF8A00 !important;
        /* Warna oranye cerah saat hover */
        transform: translateY(-2px);
        /* Subtle lift on hover */
    }

    .nav-link.active {
        background-color: #FFB300 !important;
        color: #3E2723 !important;
        border-radius: 10px;
        font-weight: 600;
        /* Semi-bold */
        box-shadow: 0 2px 8px rgba(255, 179, 0, 0.4);
        /* Bayangan untuk active link */
    }

    .avatar-icon,
    .cart-icon {
        /* Tambahkan cart-icon di sini untuk styling yang sama */
        width: 45px;
        height: 45px;
        border: 3px solid #FFB300;
        border-radius: 50%;
        color: #FFB300;
        font-size: 1.4rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        background-color: rgba(255, 179, 0, 0.1);
        text-decoration: none;
        /* Hilangkan garis bawah pada link ikon */
    }

    .avatar-icon:hover,
    .cart-icon:hover {
        /* Tambahkan cart-icon di sini */
        background-color: #FFB300;
        color: white;
        border-color: #E67A00;
        box-shadow: 0 4px 10px rgba(255, 179, 0, 0.5);
    }

    footer {
        background-color: #6D4C41 !important;
        color: #FBE9E7 !important;
        margin-top: auto;
        padding-top: 3rem;
        /* Padding lebih banyak */
        padding-bottom: 3rem;
        border-top: 1px solid rgba(255, 179, 0, 0.2);
        /* Garis tipis di atas footer */
    }

    footer h5,
    footer h6 {
        color: #FFB300 !important;
        margin-bottom: 1rem;
    }

    footer p,
    footer li {
        font-size: 0.95rem;
        /* Ukuran teks lebih teratur */
        line-height: 1.6;
    }

    footer a {
        color: #FBE9E7 !important;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    footer a:hover {
        color: #FFB300 !important;
        text-decoration: underline;
    }

    footer .d-flex.gap-3 a {
        font-size: 1.8rem !important;
        /* Ukuran ikon sosial lebih besar */
        transition: transform 0.3s ease;
    }

    footer .d-flex.gap-3 a:hover {
        transform: translateY(-3px);
        /* Efek angkat pada ikon sosial */
        color: #FF8A00 !important;
    }

    footer .text-white-50 {
        color: rgba(251, 233, 231, 0.6) !important;
        margin-top: 2rem !important;
        font-size: 0.85rem;
    }


    /* === Animasi Detail Pesanan & Item === */

    /* Card detail & daftar item */
    .container .card {
        opacity: 0;
        transform: translateY(40px) scale(0.95);
        animation: fadeZoomUp 0.6s ease-out forwards;
    }

    /* urutan biar muncul barengan tapi beda dikit */
    .container .card:nth-of-type(1) {
        animation-delay: 0.1s;
    }

    .container .card:nth-of-type(2) {
        animation-delay: 0.3s;
    }

    /* Judul detail */
    .container h4 {
        opacity: 0;
        transform: translateX(-30px);
        animation: slideInTitle 0.5s ease forwards;
        animation-delay: 0s;
    }

    /* Teks di dalam detail */
    .container .card-body p {
        opacity: 0;
        transform: translateX(30px);
        animation: slideFadeText 0.5s ease forwards;
    }

    .container .card-body p:nth-of-type(1) {
        animation-delay: 0.2s;
    }

    .container .card-body p:nth-of-type(2) {
        animation-delay: 0.3s;
    }

    .container .card-body p:nth-of-type(3) {
        animation-delay: 0.4s;
    }

    .container .card-body p:nth-of-type(4) {
        animation-delay: 0.5s;
    }

    .container .card-body p:nth-of-type(5) {
        animation-delay: 0.6s;
    }

    .container .card-body p:nth-of-type(6) {
        animation-delay: 0.7s;
    }

    .container .card-body p:nth-of-type(7) {
        animation-delay: 0.8s;
    }

    /* Table item */
    .container table {
        opacity: 0;
        transform: scale(0.95);
        animation: tablePop 0.5s ease-out forwards;
        animation-delay: 0.6s;
    }

    /* Tombol kembali */
    .container .btn-secondary {
        opacity: 0;
        transform: translateY(20px);
        animation: buttonFadeUp 0.4s ease forwards;
        animation-delay: 0.9s;
    }

    /* === Keyframes === */
    @keyframes fadeZoomUp {
        from {
            opacity: 0;
            transform: translateY(40px) scale(0.95);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes slideInTitle {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideFadeText {
        from {
            opacity: 0;
            transform: translateX(30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes tablePop {
        from {
            opacity: 0;
            transform: scale(0.95);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes buttonFadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* 🌸 Background utama halaman checkout */
    body {
        background-color: #FBE9E7 !important;
    }
</style>
