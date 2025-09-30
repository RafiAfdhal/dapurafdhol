  <style>
        /* Palet Warna Dapur Afdhol:
         * Cokelat Gelap (body background overlay): #6D4C41 (RGBA: 109, 76, 65)
         * Cokelat Sedang (login-container / footer background): #8D6E63 (RGBA: 141, 110, 99) -> Di sini akan pakai 6D4C41 untuk footer
         * Oranye/Kuning (aksen, button, link): #FFB300
         * Oranye Cerah (button hover): #FF8A00
         * Oranye Gelap (button hover darker): #E67A00
         * Krem (text, input background): #FBE9E7
         * Teks Utama: #3E2723 (Dark Brown)
         * Teks Sekunder/Placeholder: #A1887F (Medium Brown)
         */

        body {
            font-family: 'Poppins', sans-serif; /* Font utama untuk body */
            color: #3E2723; /* Warna teks utama */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            position: relative;
            overflow-x: hidden;
        }

        /* Overlay untuk transparansi pada background */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(109, 76, 65, 0.75); /* Sedikit lebih gelap dari sebelumnya */
            z-index: -1;
        }

        h1, h2, h5, h6 {
            font-family: 'Playfair Display', serif; /* Font elegan untuk judul */
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.9); /* Sedikit lebih transparan */
            box-shadow: 0 4px 15px rgba(0,0,0,0.1); /* Bayangan lebih halus */
            backdrop-filter: blur(8px); /* Efek frosted glass */
            -webkit-backdrop-filter: blur(8px); /* Kompatibilitas Safari */
            border-bottom: 1px solid rgba(255, 179, 0, 0.2); /* Garis tipis di bawah navbar */
        }

        .navbar-brand img {
            transition: transform 0.3s ease; /* Transisi untuk efek hover logo */
            height: 75px; /* Ukuran logo yang disesuaikan */
        }
        .navbar-brand img:hover {
            transform: scale(1.05); /* Efek zoom saat hover logo */
        }

        .nav-link {
            color: #3E2723 !important;
            font-weight: 500; /* Medium weight */
            padding: 10px 18px !important; /* Padding yang konsisten */
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: #FF8A00 !important; /* Warna oranye cerah saat hover */
        }

        .nav-link.active {
            background-color: #FFB300 !important;
            color: #3E2723 !important;
            border-radius: 10px;
            font-weight: 600; /* Semi-bold */
            box-shadow: 0 2px 8px rgba(255, 179, 0, 0.4); /* Bayangan untuk active link */
        }

        .btn-primary-custom {
            background-color: #FF8A00;
            border-color: #FF8A00;
            color: white;
            font-weight: 600;
            padding: 12px 25px; /* Padding lebih besar */
            border-radius: 30px; /* Lebih bulat */
            transition: all 0.3s ease;
        }
        .btn-primary-custom:hover {
            background-color: #E67A00;
            border-color: #E67A00;
            transform: translateY(-2px); /* Efek angkat saat hover */
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .btn-outline-custom {
            border: 2px solid #FF8A00;
            color: #FF8A00;
            font-weight: 600;
            padding: 12px 25px; /* Padding lebih besar */
            border-radius: 30px; /* Lebih bulat */
            transition: all 0.3s ease;
        }
        .btn-outline-custom:hover {
            background-color: #FF8A00;
            color: white;
            transform: translateY(-2px); /* Efek angkat saat hover */
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .rounded-img {
            border-radius: 20px;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        .avatar-icon, .cart-icon { /* Menambahkan cart-icon di sini */
            width: 48px; /* Sedikit lebih besar */
            height: 48px;
            border: 3px solid #FFB300; /* Border lebih tebal */
            border-radius: 50%;
            color: #FFB300;
            font-size: 1.5rem; /* Ukuran ikon di dalam lingkaran */
            display: flex; /* Untuk memusatkan ikon */
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            background-color: rgba(255, 179, 0, 0.1); /* Latar belakang ikon transparan */
        }
        .avatar-icon:hover, .cart-icon:hover { /* Menambahkan cart-icon di sini */
            background-color: #FFB300;
            color: white;
            border-color: #E67A00;
            box-shadow: 0 4px 10px rgba(255, 179, 0, 0.5);
        }

        /* search-bar styles removed */

        .hero-section {
            color: #FBE9E7;
            padding-top: 6rem; /* Padding lebih banyak */
            padding-bottom: 6rem;
            text-align: left; /* Teks rata kiri */
        }
        .hero-section h1 {
            color: #FFB300;
            font-size: 3.5rem; /* Ukuran font lebih besar */
            line-height: 1.2;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.6); /* Shadow lebih kuat */
        }
        .hero-section p {
            color: #FBE9E7;
            font-size: 1.1rem; /* Ukuran paragraf lebih besar */
            margin-bottom: 2rem;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.4);
        }

        /* Gambar di hero section */
        .hero-section img {
            border: 6px solid rgba(255, 179, 0, 0.8); /* Border lebih tebal dan buram */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5); /* Bayangan lebih kuat */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hero-section img:hover {
            transform: scale(1.02); /* Sedikit zoom saat hover */
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
        }


        footer {
            background-color: #6D4C41 !important;
            color: #FBE9E7 !important;
            margin-top: auto;
            padding-top: 3rem; /* Padding lebih banyak */
            padding-bottom: 3rem;
            border-top: 1px solid rgba(255, 179, 0, 0.2); /* Garis tipis di atas footer */
        }
        footer h5, footer h6 {
            color: #FFB300 !important;
            margin-bottom: 1rem;
        }
        footer p, footer li {
            font-size: 0.95rem; /* Ukuran teks lebih teratur */
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
            font-size: 1.8rem !important; /* Ukuran ikon sosial lebih besar */
            transition: transform 0.3s ease;
        }
        footer .d-flex.gap-3 a:hover {
            transform: translateY(-3px); /* Efek angkat pada ikon sosial */
            color: #FF8A00 !important;
        }
        footer .text-white-50 {
            color: rgba(251, 233, 231, 0.6) !important;
            margin-top: 2rem !important;
            font-size: 0.85rem;
        }
    </style>