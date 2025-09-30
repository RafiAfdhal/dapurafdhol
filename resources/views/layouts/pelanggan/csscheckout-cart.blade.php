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

    body {
        font-family: 'Poppins', sans-serif;
        color: #3E2723;
        background-color: #FBE9E7;
    }

    h1,
    h2,
    h5,
    h6 {
        font-family: 'Playfair Display', serif;
    }

    .cart-container {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .cart-item {
        display: flex;
        align-items: center;
        background-color: #fcfcfc;
        border: 1px solid #eee;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .cart-item:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .item-image {
        width: 100px;
        height: 100px;
        border-radius: 10px;
        object-fit: cover;
        margin-right: 20px;
        border: 2px solid #FFB300;
        box-shadow: 0 2px 8px rgba(255, 179, 0, 0.2);
    }

    .item-details {
        flex-grow: 1;
    }

    .item-name {
        font-weight: 600;
        font-size: 1.25rem;
        margin-bottom: 5px;
    }

    .item-price-info {
        font-size: 0.95rem;
        color: #A1887F;
    }

    .item-actions {
        display: flex;
        gap: 10px;
        margin-left: 20px;
    }

    .delete-item-btn {
        background: none;
        border: none;
        color: #E67A00;
        font-size: 1.5rem;
        cursor: pointer;
    }

    .delete-item-btn:hover {
        color: #FFB300;
        transform: scale(1.1);
    }

    .order-item-btn {
        background-color: #FFB300;
        border: none;
        color: #3E2723;
        padding: 10px 20px;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(255, 179, 0, 0.4);
    }

    .order-item-btn:hover {
        background-color: #FF8A00;
        color: #3E2723;
        transform: translateY(-2px);
    }

    .empty-cart-message {
        text-align: center;
        padding: 60px 20px;
        color: #A1887F;
        font-size: 1.3rem;
        background-color: #fcfcfc;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .empty-cart-message i {
        font-size: 4rem;
        margin-bottom: 25px;
        color: #FFB300;
    }

    .empty-cart-btn {
        background-color: #FFB300;
        border: none;
        color: #3E2723;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 6px 15px rgba(255, 179, 0, 0.5);
    }

    .empty-cart-btn:hover {
        background-color: #FF8A00;
        color: #3E2723;
    }

    .item-price-info {
        font-size: 0.95rem;
        color: #6D4C41;
        margin-top: 3px;
    }

    .item-price-info.subtotal {
        font-size: 1.05rem;
        font-weight: 600;
        color: #E67A00;
    }

    .checkout-img {
        width: 70px;
        height: 70px;
        object-fit: contain;
        /* gambar fit semua, bisa ada background kosong */
        background-color: #fff;
        border: 1px solid #eee;
        border-radius: 8px;
    }


    /* ===== Animasi Global Checkout ===== */
    .checkout-menu-card,
    .card-body form .mb-3,
    .card-body form button {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeSlideUp 0.5s ease forwards;
    }

    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Urutan delay biar animasinya rapi */
    .checkout-menu-card {
        animation-delay: 0.1s;
    }

    .card-body form .mb-3:nth-of-type(1) {
        animation-delay: 0.2s;
    }

    .card-body form .mb-3:nth-of-type(2) {
        animation-delay: 0.3s;
    }

    .card-body form .mb-3:nth-of-type(3) {
        animation-delay: 0.4s;
    }

    .card-body form .mb-3:nth-of-type(4) {
        animation-delay: 0.5s;
    }

    .card-body form .mb-3:nth-of-type(5) {
        animation-delay: 0.6s;
    }

    .card-body form .mb-3:nth-of-type(6) {
        animation-delay: 0.7s;
    }

    .card-body form button.btn-warning {
        animation-delay: 0.8s;
    }

    .card-body form button.btn-outline-dark {
        animation-delay: 0.9s;
    }


    /* Efek saat focus */
    .card-body input.form-control,
    .card-body textarea.form-control,
    .card-body select.form-select {
        transition: all 0.3s ease;
        border: 1px solid #ccc;
    }

    .card-body input.form-control:focus,
    .card-body textarea.form-control:focus,
    .card-body select.form-select:focus {
        border-color: #ff8a00;
        box-shadow: 0 0 10px rgba(255, 138, 0, 0.4);
    }

    /* Label ikut highlight */
    .card-body label.form-label {
        transition: all 0.3s ease;
    }

    .card-body .mb-3:focus-within label.form-label {
        color: #ff8a00;
        font-weight: 600;
    }
</style>