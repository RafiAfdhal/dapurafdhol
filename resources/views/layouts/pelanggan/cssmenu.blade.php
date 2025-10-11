<style>
    body {
        font-family: 'Poppins', sans-serif;
        color: #3E2723;
        background-color: #FBE9E7;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
        overflow-x: hidden;
    }

    h1,
    h2,
    h5,
    h6 {
        font-family: 'Playfair Display', serif;
    }

    /* --- Navbar Styles --- */
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

    /* --- Hero Section for Menu Page --- */
    .menu-hero {
        background-image: url('../img/background.jpg');
        background-size: cover;
        background-position: center;
        color: #FBE9E7;
        padding: 80px 0;
        text-align: center;
        position: relative;
        z-index: 1;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .menu-hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(109, 76, 65, 0.6);
        z-index: -1;
    }

    .menu-hero .section-title {
        color: #FBE9E7;
        font-size: 3.5rem;
        margin-bottom: 20px;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    .menu-hero .search-bar-hero {
        display: none;
        /* Menyembunyikan search bar di hero */
    }

    /* --- Menu & Filter Layout --- */
    .menu-content-wrapper {
        display: flex;
        gap: 30px;
    }

    .menu-filter-column {
        flex: 0 0 250px;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 100px;
        height: fit-content;
        align-self: flex-start;
    }

    .menu-filter-column h5 {
        color: #3E2723;
        margin-bottom: 20px;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
    }

    .menu-filter-column .list-group-item {
        background-color: transparent;
        border: none;
        padding: 10px 0;
        color: #A1887F;
        font-weight: 500;
        transition: all 0.2s ease;
        cursor: default;
        /* Ubah cursor menjadi default karena tidak berfungsi */
        text-align: left;
    }

    .menu-filter-column .list-group-item.active {
        color: #3E2723;
        background-color: rgba(255, 179, 0, 0.1);
        border-radius: 5px;
        padding-left: 15px;
        font-weight: 600;
    }

    .menu-items-column {
        flex-grow: 1;
    }

    /* Menu Card Styles */
    .menu-item {
        display: block;
        /* Pastikan semua item selalu terlihat */
    }

    .menu-card {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }

    .menu-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #FFB300;
    }

    .menu-card .card-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .menu-card .card-title {
        font-family: 'Playfair Display', serif;
        color: #3E2723;
        font-size: 1.6rem;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .menu-card .card-text {
        color: #A1887F;
        font-size: 0.95rem;
        line-height: 1.6;
        flex-grow: 1;
    }

    .menu-card .item-actions {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 10px;
        width: 100%;
        margin-top: auto;
    }

    @media (min-width: 768px) {
        .menu-card .item-actions {
            flex-direction: row;
            align-items: center;
        }
    }

    .menu-card .item-price {
        font-family: 'Poppins', sans-serif;
        color: #FF8A00;
        font-size: 1.5rem;
        font-weight: 700;
        margin-top: 0;
        margin-bottom: 0;
        text-align: left;
        flex-grow: 1;
    }

    .menu-card .action-buttons {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .menu-card .btn-add-to-cart {
        background-color: #FFB300 !important;
        border: none !important;
        color: #3E2723 !important;
        font-weight: 600;
        padding: 8px 18px;
        border-radius: 50px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(255, 179, 0, 0.3);
        white-space: nowrap;
    }

    .menu-card .btn-add-to-cart:hover {
        background-color: #E67A00 !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(255, 179, 0, 0.5);
    }

    .menu-card .btn-cart-icon {
        background-color: transparent !important;
        border: 2px solid #FFB300 !important;
        color: #FFB300 !important;
        padding: 8px 12px;
        border-radius: 50%;
        font-size: 1rem;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .menu-card .btn-cart-icon:hover {
        background-color: #FFB300 !important;
        color: white !important;
        border-color: #E67A00 !important;
        transform: scale(1.08);
        box-shadow: 0 4px 10px rgba(255, 179, 0, 0.5);
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .navbar-brand img {
            height: 60px;
        }

        .navbar-collapse {
            text-align: center;
        }

        .navbar-nav .nav-link {
            padding: 8px 15px !important;
        }

        .navbar-nav {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .d-flex.align-items-center.gap-3 {
            flex-direction: row;
            justify-content: center;
            width: 100%;
            margin-right: 0 !important;
            margin-top: 15px;
        }

        .avatar-icon,
        .cart-icon {
            margin: 0 8px;
        }

        .menu-hero .section-title {
            font-size: 2.8rem;
        }

        .menu-content-wrapper {
            flex-direction: column;
            gap: 20px;
        }

        .menu-filter-column {
            position: static;
            width: 100%;
            max-width: none;
            flex: none;
            top: auto;
            height: auto;
            order: -1;
        }

        .menu-filter-column h5,
        .menu-filter-column .list-group-item {
            text-align: center;
        }

        .menu-filter-column .list-group-item.active {
            padding-left: 0;
        }

        .menu-items-column {
            width: 100%;
        }
    }

    @media (max-width: 768px) {
        .section-title {
            font-size: 2.2rem;
        }

        .menu-card img {
            height: 180px;
        }

        .menu-card .card-title {
            font-size: 1.4rem;
        }

        .menu-card .item-price {
            font-size: 1.3rem;
        }
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

    /* Pagination Styling */
    .pagination {
        display: flex;
        justify-content: center;
        margin: 20px 0;
        list-style: none;
        padding-left: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a,
    .pagination li span {
        color: #333;
        padding: 8px 14px;
        border: 1px solid #ddd;
        border-radius: 6px;
        text-decoration: none;
        background-color: #fff;
        transition: 0.3s;
    }

    .pagination li a:hover {
        background-color: #FFB300;
        color: #fff;
    }

    .pagination .active span {
        background-color: #FFB300;
        color: #fff;
        border: 1px solid #FFB300;
    }

    .pagination .disabled span {
        color: #ccc;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
    }

    /* Search Bar */
    .search-input {
        border-radius: 30px;
        padding: 12px 25px;
        border: none;
        width: 70%;
        /* lebih panjang */
        max-width: 700px;
        /* batasi maksimal */
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
        font-size: 1.1rem;
    }

    .btn-search {
        border-radius: 30px;
        background: #ff9800;
        color: #fff;
        padding: 12px 30px;
        border: none;
        font-size: 1.1rem;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
    }

    .btn-search:hover {
        background: #e68900;
    }


    /* 🛍️ Filter kategori vertikal ala Shopee/Tokopedia */
    .kategori-filter-vertical {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .kategori-btn-vertical {
        text-align: left;
        border: 1px solid #ddd;
        background: #fff;
        color: #333;
        border-radius: 8px;
        padding: 10px 14px;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        width: 100%;
    }

    .kategori-btn-vertical:hover {
        background: #f9f9f9;
        border-color: #bbb;
    }

    .kategori-btn-vertical.active {
        background: #ff9800;
        /* oranye Shopee */
        color: #fff;
        border-color: #ff5722;
        font-weight: 600;
    }

    .menu-item.slide-left {
        opacity: 0;
        transform: translateX(-50px);
        animation: slideInLeft 0.6s ease forwards;
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }


    /* ✨ Animasi masuk untuk menu items */
    .menu-item {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeSlideIn 0.6s ease forwards;
    }

    /* Animasi berputar (rotate in) */
    @keyframes rotateIn {
        from {
            opacity: 0;
            transform: rotateY(90deg) scale(0.8);
        }

        to {
            opacity: 1;
            transform: rotateY(0deg) scale(1);
        }
    }

    /* Terapkan ke menu-item */
    .menu-item {
        opacity: 0;
        animation: rotateIn 0.6s ease forwards;
    }

    /* Supaya tiap kartu muncul berurutan */
    .menu-item:nth-child(1) {
        animation-delay: 0.1s;
    }

    .menu-item:nth-child(2) {
        animation-delay: 0.2s;
    }

    .menu-item:nth-child(3) {
        animation-delay: 0.3s;
    }

    .menu-item:nth-child(4) {
        animation-delay: 0.4s;
    }

    .menu-item:nth-child(5) {
        animation-delay: 0.5s;
    }

    .menu-item:nth-child(6) {
        animation-delay: 0.6s;
    }

    /* Efek animasi untuk filter kategori */
    .kategori-filter-vertical button {
        opacity: 0;
        transform: translateX(-20px);
        animation: filterSlideIn 0.5s ease forwards;
    }

    /* Biar tiap tombol kategori muncul berurutan */
    .kategori-filter-vertical button:nth-child(1) {
        animation-delay: 0.1s;
    }

    .kategori-filter-vertical button:nth-child(2) {
        animation-delay: 0.2s;
    }

    .kategori-filter-vertical button:nth-child(3) {
        animation-delay: 0.3s;
    }

    .kategori-filter-vertical button:nth-child(4) {
        animation-delay: 0.4s;
    }

    .kategori-filter-vertical button:nth-child(5) {
        animation-delay: 0.5s;
    }

    .kategori-filter-vertical button:nth-child(6) {
        animation-delay: 0.6s;
    }

    .kategori-filter-vertical button:nth-child(7) {
        animation-delay: 0.7s;
    }

    /* Keyframes slide in */
    @keyframes filterSlideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* --- Hero Section for Menu Page --- */
    .menu-hero {
        background-image: url('../img/background.jpg');
        background-size: cover;
        background-position: center;
        color: #FBE9E7;
        padding: 80px 0;
        text-align: center;
        position: relative;
        z-index: 1;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        /* Animasi background zoom pelan */
        animation: heroBackgroundZoom 10s ease-in-out infinite alternate;
    }

    .menu-hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(109, 76, 65, 0.6);
        z-index: -1;
    }

    /* Animasi judul muncul dengan zoom dan fade */
    .menu-hero .section-title {
        color: #FBE9E7;
        font-size: 3.5rem;
        margin-bottom: 20px;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        opacity: 0;
        transform: translateY(40px) scale(0.95);
        animation: titleFadeZoom 1.5s ease forwards;
    }

    /* Efek background zoom perlahan */
    @keyframes heroBackgroundZoom {
        from {
            background-size: 100%;
        }

        to {
            background-size: 110%;
        }
    }

    /* Efek judul fade + zoom in */
    @keyframes titleFadeZoom {
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Animasi untuk search bar hero (lebih simpel) */
    .menu-hero .search-form {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.5s ease forwards;
        animation-delay: 0.3s;
        /* opsional, bisa dihapus kalau mau bareng */
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

</style>
