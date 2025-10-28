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


    /* Palet Warna Dapur Afdhol (dari pesan_part1.html):
         * Cokelat Gelap (body background overlay): #6D4C41 (RGBA: 109, 76, 65)
         * Cokelat Sedang (login-container / footer background): #8D6E63 (RGBA: 141, 110, 99)
         * Oranye/Kuning (aksen, button, link): #FFB300
         * Oranye Cerah (button hover): #FF8A00
         * Oranye Gelap (button hover darker): #E67A00
         * Krem (text, input background): #FBE9E7
         * Teks Utama: #3E2723 (Dark Brown)
         * Teks Sekunder/Placeholder: #A1887F (Medium Brown)
         */
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

    /* Main Content Card - Menggunakan gaya checkout-card dari pesan_part1.html */
    .ulasan-container {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        /* Padding sama dengan checkout-card */
        /* max-width bisa diatur di sini jika ingin lebih kecil */
        max-width: 800px;
        /* Contoh: Atur lebar maksimal untuk kotak utama */
        margin: 50px auto;
        /* Tengah di halaman */
        display: flex;
        flex-direction: column;
    }

    .ulasan-container h5 {
        color: #3E2723;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        margin-bottom: 20px;
        border-bottom: 2px solid #FFB300;
        padding-bottom: 10px;
    }

    .ulasan-container h2 {
        color: #3E2723;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
    }

    /* Product Overview Section - Disesuaikan dengan produk-overview di pesan_part1.html */
    .product-info-ulasan {
        display: flex;
        align-items: center;
        /* Untuk sejajar vertikal */
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid rgba(255, 179, 0, 0.2);
        /* Mirip dengan garis di pesan_part1.html */
    }

    .product-info-ulasan .product-img {
        width: 100%;
        max-width: 150px;
        /* Mengurangi ukuran gambar agar kotak tidak terlalu besar */
        height: auto;
        border-radius: 12px;
        object-fit: cover;
        border: 2px solid #FFB300;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-right: 25px;
        /* Jarak antara gambar dan teks */
        flex-shrink: 0;
        /* Agar gambar tidak mengecil saat konten lain banyak */
    }

    .product-info-ulasan .product-details {
        flex-grow: 1;
        /* Agar detail produk mengisi sisa ruang */
    }

    .product-info-ulasan .product-name {
        font-size: 1.8rem;
        /* Sedikit lebih kecil dari hero di pesan_part1 */
        font-weight: 700;
        color: #3E2723;
        margin-bottom: 5px;
        font-family: 'Playfair Display', serif;
    }

    .product-info-ulasan .product-description {
        font-size: 0.9rem;
        /* Sedikit lebih kecil */
        color: #5D4037;
        margin-bottom: 10px;
        line-height: 1.5;
    }

    .product-info-ulasan .product-price {
        font-weight: 700;
        color: #FF8A00;
        font-size: 1.5rem;
    }

    /* Rating Stars (Input) */
    .rating-stars-input input[type="radio"] {
        display: none;
    }

    .rating-stars-input label {
        cursor: pointer;
        padding: 0 2px;
        float: right;
        /* For RTL star selection */
    }

    .rating-stars-input label i {
        color: #E0E0E0;
        /* Light gray for empty stars */
        transition: color 0.2s ease-in-out;
    }

    .rating-stars-input input[type="radio"]:checked~label i,
    .rating-stars-input label:hover i,
    .rating-stars-input label:hover~label i {
        color: #FFB300;
        /* Dapur Afdhol orange/yellow for selected/hovered stars */
    }

    .rating-stars-input {
        direction: rtl;
        /* To arrange stars from right to left */
        unicode-bidi: isolate;
        display: inline-flex;
        font-size: 1.5rem;
        /* Ukuran bintang input */
    }

    /* Rating Stars (Display) */
    .rating-stars-display {
        font-size: 1.2rem;
        color: #FFB300;
    }

    .rating-stars-display .bi-star-fill,
    .rating-stars-display .bi-star-half {
        color: #FFB300;
    }

    .rating-stars-display .bi-star {
        color: #E0E0E0;
    }

    /* Empty star in display */


    /* Form Styling (dari pesan_part1.html) */
    .form-control,
    .form-select {
        border: 1px solid #FFB300;
        border-radius: 8px;
        padding: 10px 15px;
        background-color: #FBE9E7;
        color: #3E2723;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #FF8A00;
        box-shadow: 0 0 0 0.25rem rgba(255, 179, 0, 0.25);
        background-color: white;
    }

    .form-control::placeholder {
        color: #A1887F;
        opacity: 0.8;
    }

    .form-label {
        color: #3E2723;
        font-weight: 500;
        margin-bottom: 8px;
    }

    /* Buttons (dari pesan_part1.html) */
    .btn-primary-afdhol {
        background-color: #FFB300;
        border-color: #FFB300;
        color: #3E2723;
        padding: 12px 25px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(255, 179, 0, 0.4);
    }

    .btn-primary-afdhol:hover {
        background-color: #FF8A00;
        border-color: #FF8A00;
        transform: translateY(-2px);
        color: #3E2723;
    }

    .btn-secondary-afdhol {
        background-color: #A1887F;
        border-color: #A1887F;
        color: white;
        padding: 12px 25px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .btn-secondary-afdhol:hover {
        background-color: #8D6E63;
        border-color: #8D6E63;
        transform: translateY(-2px);
    }

    /* Small Buttons (for edit/delete) */
    .btn-sm-afdhol-primary {
        background-color: #FFB300;
        border-color: #FFB300;
        color: #3E2723;
        padding: 6px 15px;
        border-radius: 20px;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .btn-sm-afdhol-primary:hover {
        background-color: #FF8A00;
        border-color: #FF8A00;
        transform: translateY(-1px);
    }

    .btn-sm-afdhol-danger {
        background-color: #E53E3E;
        border-color: #E53E3E;
        color: white;
        padding: 6px 15px;
        border-radius: 20px;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .btn-sm-afdhol-danger:hover {
        background-color: #C53030;
        border-color: #C53030;
        transform: translateY(-1px);
    }

    .btn-sm-afdhol-success {
        background-color: #38A169;
        border-color: #38A169;
        color: white;
        padding: 6px 15px;
        border-radius: 20px;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .btn-sm-afdhol-success:hover {
        background-color: #2F855A;
        border-color: #2F855A;
        transform: translateY(-1px);
    }

    /* User Avatar (dari pesan_part1.html) */
    .user-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background-color: #FFB300;
        /* Default/example color */
        color: white;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    /* Review Card styling */
    .review-card {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        padding: 25px;
        margin-bottom: 20px;
    }

    .review-card .reviewer-name {
        font-weight: 600;
        color: #3E2723;
    }

    .review-card .review-date {
        font-size: 0.85rem;
        color: #A1887F;
    }

    .review-card .review-text {
        color: #3E2723;
        margin-top: 10px;
        line-height: 1.6;
    }

    .review-form-edit {
        background-color: #FBE9E7;
        border-radius: 12px;
        padding: 20px;
        margin-top: 15px;
        border: 1px solid rgba(255, 179, 0, 0.2);
    }


    /* Responsive adjustments */
    @media (max-width: 991.98px) {

        /* Tablet and below - stack vertically */
        .ulasan-container {
            margin: 30px auto;
            padding: 20px;
        }

        .product-info-ulasan {
            flex-direction: column;
            text-align: center;
        }

        .product-info-ulasan .product-img {
            margin-right: 0;
            margin-bottom: 15px;
            max-width: 120px;
        }

        .product-info-ulasan .product-name {
            font-size: 1.6rem;
        }

        .product-info-ulasan .product-price {
            font-size: 1.3rem;
        }

        .rating-stars-input {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 768px) {
        .ulasan-container {
            margin: 20px auto;
            padding: 15px;
        }
    }
</style>
