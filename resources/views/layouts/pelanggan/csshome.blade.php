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
          font-family: 'Poppins', sans-serif;
          /* Font utama untuk body */
          color: #3E2723;
          /* Warna teks utama */
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
          background-color: rgba(109, 76, 65, 0.75);
          /* Sedikit lebih gelap dari sebelumnya */
          z-index: -1;
      }

      h1,
      h2,
      h5,
      h6 {
          font-family: 'Playfair Display', serif;
          /* Font elegan untuk judul */
      }

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

      .btn-primary-custom {
          background-color: #FF8A00;
          border-color: #FF8A00;
          color: white;
          font-weight: 600;
          padding: 12px 25px;
          /* Padding lebih besar */
          border-radius: 30px;
          /* Lebih bulat */
          transition: all 0.3s ease;
      }

      .btn-primary-custom:hover {
          background-color: #E67A00;
          border-color: #E67A00;
          transform: translateY(-2px);
          /* Efek angkat saat hover */
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      }

      .btn-outline-custom {
          border: 2px solid #FF8A00;
          color: #FF8A00;
          font-weight: 600;
          padding: 12px 25px;
          /* Padding lebih besar */
          border-radius: 30px;
          /* Lebih bulat */
          transition: all 0.3s ease;
      }

      .btn-outline-custom:hover {
          background-color: #FF8A00;
          color: white;
          transform: translateY(-2px);
          /* Efek angkat saat hover */
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      }

      .rounded-img {
          border-radius: 20px;
          object-fit: cover;
          width: 100%;
          height: 100%;
      }

      /* search-bar styles removed */

      .hero-section {
          color: #FBE9E7;
          padding-top: 6rem;
          /* Padding lebih banyak */
          padding-bottom: 6rem;
          text-align: left;
          /* Teks rata kiri */
      }

      .hero-section h1 {
          color: #FFB300;
          font-size: 3.5rem;
          /* Ukuran font lebih besar */
          line-height: 1.2;
          margin-bottom: 1.5rem;
          text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
          /* Shadow lebih kuat */
      }

      .hero-section p {
          color: #FBE9E7;
          font-size: 1.1rem;
          /* Ukuran paragraf lebih besar */
          margin-bottom: 2rem;
          text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
      }

      /* Gambar di hero section */
      .hero-section img {
          border: 6px solid rgba(255, 179, 0, 0.8);
          /* Border lebih tebal dan buram */
          box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
          /* Bayangan lebih kuat */
          transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .hero-section img:hover {
          transform: scale(1.02);
          /* Sedikit zoom saat hover */
          box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
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


      /* --- Animasi Hero Section (muncul bareng semua) --- */
      .hero-section {
          opacity: 0;
          transform: translateY(20px);
          animation: fadeInUp 0.6s ease forwards;
      }

      .hero-section h1,
      .hero-section p,
      .hero-section img {
          opacity: 0;
          transform: scale(0.95);
          animation: fadeZoomIn 0.6s ease forwards;
      }

      /* Keyframes */
      @keyframes fadeInUp {
          to {
              opacity: 1;
              transform: translateY(0);
          }
      }

      @keyframes fadeZoomIn {
          to {
              opacity: 1;
              transform: scale(1);
          }
      }

      /* ------------------- STYLES UNTUK HERO SECTION ------------------- */
      .hero-section-showcase {
          padding-top: 7rem;
          padding-bottom: 5rem;
          min-height: 80vh;
      }

      .hero-section-showcase h1 {
          font-family: 'Playfair Display', serif;
          font-size: 4rem;
          font-weight: 800;
          line-height: 1.1;
          color: #FFB300;
          /* Aksen Oranye */
          text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
          margin-bottom: 1.5rem;
      }

      .hero-section-showcase p {
          font-size: 1.1rem;
          color: #FBE9E7;
          margin-bottom: 2rem;
          line-height: 1.7;
      }

      /* Styling Gambar Utama dengan Efek 3D */
      .hero-image-3d {
          border: 10px solid rgba(255, 179, 0, 0.9);
          box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
          border-radius: 20px;
          transform: rotate(-3deg);
          /* Rotasi sedikit */
          transition: transform 0.5s ease;
      }

      .hero-image-3d:hover {
          transform: rotate(0deg) scale(1.03);
      }

      /* Tombol Utama */
      .btn-hero-primary {
          padding: 16px 40px;
          font-size: 1.1rem;
          font-weight: 700;
          border-radius: 50px;
          background-color: #FFB300;
          color: #3E2723;
          box-shadow: 0 5px 15px rgba(255, 179, 0, 0.5);
      }

      /* ------------------- STYLES UNTUK GALERI MAKANAN ------------------- */
      .gallery-section {
          background-color: #FBE9E7;
          /* Latar belakang cokelat gelap */
          padding: 5rem 0;
          border-top: 5px solid #E67A00;
      }

      .gallery-section h2 {
          font-family: 'Playfair Display', serif;
          font-weight: 700;
          color: #FFB300;
          margin-bottom: 3rem;
          text-align: center;
      }

      .menu-card {
          background-color: #5D4037;
          /* Latar belakang kartu yang lebih terang dari body */
          border-radius: 15px;
          overflow: hidden;
          transition: transform 0.3s ease, box-shadow 0.3s ease;
          box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
          height: 100%;
          /* Memastikan tinggi kartu seragam */
      }

      .menu-card:hover {
          transform: translateY(-8px);
          box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
      }

      .menu-card img {
          height: 200px;
          object-fit: cover;
          width: 100%;
      }

      .menu-card-body {
          padding: 1.5rem;
          text-align: left;
      }

      .menu-card-body h5 {
          font-family: 'Poppins', sans-serif;
          font-weight: 600;
          color: #FBE9E7;
          margin-bottom: 0.5rem;
      }

      .menu-card-body p {
          color: #C0C0C0;
          font-size: 0.9rem;
          margin-bottom: 1rem;
      }

      .price-tag {
          font-size: 1.2rem;
          font-weight: 700;
          color: #FFB300;
      }

      .hero-section-showcase {
          position: relative;
          width: 100vw;
          /* pastikan lebar penuh */
          margin-left: calc(-50vw + 50%);
          /* trik agar benar-benar menempel ke kiri dan ke kanan */
          background: url('{{ asset('img/background.jpg') }}') center center / cover no-repeat;
          color: #fff;
          padding: 100px 0;
          border-radius: 0 0 60px 60px;
          overflow: hidden;
      }



      /* Efek overlay gelap supaya teks tetap terbaca */
      .hero-section-showcase::before {
          content: "";
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: rgba(30, 30, 30, 0.5);
          /* transparansi 50% */
          z-index: 1;
      }

      /* Pastikan isi tampil di atas overlay */
      .hero-section-showcase .row {
          position: relative;
          z-index: 2;
      }

      /* Pastikan hero responsif di HP */
      @media (max-width: 767px) {
          .hero-section-showcase {
              text-align: center;
              padding: 2rem 0;
          }

          .hero-section-showcase h1 {
              font-size: 1.9rem;
          }

          .hero-section-showcase p {
              font-size: 1rem;
          }

          .hero-section-showcase img {
              width: 80%;
              margin: 0 auto;
          }
      }

      /* === ANIMASI CEPAT HERO SECTION === */
      .hero-section-showcase {
          opacity: 0;
          transform: translateY(20px);
          animation: fadeInBackground 0.8s ease forwards;
      }

      /* Teks Judul */
      .hero-section-showcase h1 {
          opacity: 0;
          transform: translateY(15px);
          animation: fadeInUp 0.6s ease forwards;
          animation-delay: 0.3s;
      }

      /* Paragraf Deskripsi */
      .hero-section-showcase p {
          opacity: 0;
          transform: translateY(15px);
          animation: fadeInUp 0.6s ease forwards;
          animation-delay: 0.5s;
      }

      /* Tombol */
      .hero-section-showcase .btn {
          opacity: 0;
          transform: translateY(10px);
          animation: fadeInUp 0.6s ease forwards;
          animation-delay: 0.7s;
      }

      /* Gambar */
      .hero-section-showcase img {
          opacity: 0;
          transform: scale(0.95);
          animation: fadeZoomIn 0.7s ease forwards;
          animation-delay: 0.9s;
      }

      /* Keyframes */
      @keyframes fadeInBackground {
          from {
              opacity: 0;
              transform: scale(1.03);
          }

          to {
              opacity: 1;
              transform: scale(1);
          }
      }

      @keyframes fadeInUp {
          from {
              opacity: 0;
              transform: translateY(15px);
          }

          to {
              opacity: 1;
              transform: translateY(0);
          }
      }

      @keyframes fadeZoomIn {
          from {
              opacity: 0;
              transform: scale(0.95);
          }

          to {
              opacity: 1;
              transform: scale(1);
          }
      }
  </style>
