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
         background-color: #FBE9E7;
         /* Warna krem untuk background halaman */
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
         /* Font elegan untuk judul */
     }

     /* --- Navbar Styles (Tidak Berubah) --- */
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

     /* --- New Grid Layout Styles --- */
     .hero-about {
         background-image: url('../img/restoran.jpg');
         /* Ganti dengan gambar hero yang cocok */
         background-size: cover;
         background-position: center;
         color: white;
         text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
         min-height: 450px;
         display: flex;
         align-items: center;
         justify-content: center;
         position: relative;
         z-index: 0;
     }

     .hero-about::before {
         content: "";
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0, 0, 0, 0.4);
         /* Overlay gelap */
         z-index: -1;
     }

     .hero-about h1 {
         font-size: 3.8rem;
         margin-bottom: 0.5rem;
         color: #FFB300;
     }

     .hero-about p {
         font-size: 1.4rem;
         max-width: 700px;
         margin: 0 auto;
     }

     .about-section-intro {
         padding: 5rem 0;
         text-align: center;
         background-color: #FBE9E7;
         color: #3E2723;
     }

     .about-section-intro h2 {
         font-size: 2.8rem;
         margin-bottom: 1.5rem;
     }

     .about-section-intro p {
         font-size: 1.1rem;
         line-height: 1.7;
         max-width: 850px;
         margin: 0 auto;
     }

     .about-cards-section {
         padding: 4rem 0;
         background-color: #F8F4F2;
         /* Sedikit beda dari body untuk kontras */
     }

     .about-card {
         background-color: #FFFFFF;
         border-radius: 15px;
         padding: 2.5rem 1.5rem;
         text-align: center;
         box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
         transition: all 0.3s ease;
         height: 100%;
         /* Pastikan semua kartu tingginya sama dalam baris */
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
     }

     .about-card:hover {
         transform: translateY(-8px);
         box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
     }

     .about-card .icon-wrapper {
         font-size: 3.5rem;
         /* Ukuran ikon */
         color: #FFB300;
         /* Warna ikon */
         margin-bottom: 1.5rem;
         height: 70px;
         /* Konsistenkan tinggi wrapper ikon */
         display: flex;
         align-items: center;
         justify-content: center;
     }

     .about-card h5 {
         font-size: 1.6rem;
         color: #3E2723;
         margin-bottom: 0.75rem;
         font-weight: 700;
     }

     .about-card p {
         font-size: 0.95rem;
         color: #A1887F;
         /* Teks sekunder */
         line-height: 1.6;
         flex-grow: 1;
         /* Agar paragraf mengisi ruang yang tersedia */
     }


     /* --- Footer Styles (Tidak Berubah) --- */
     footer {
         background-color: #6D4C41 !important;
         /* Warna cokelat gelap dari tema */
         color: #FBE9E7 !important;
         /* Warna teks kaki */
         margin-top: auto;
         padding-top: 3rem;
         padding-bottom: 3rem;
         border-top: 1px solid rgba(255, 179, 0, 0.2);
     }

     footer h5,
     footer h6 {
         color: #FFB300 !important;
         margin-bottom: 1rem;
     }

     footer p,
     footer li {
         font-size: 0.95rem;
         /* Keep existing size for list items */
         line-height: 1.6;
     }

     footer .col-md-4 p.small {
         font-size: 1.05rem;
         font-weight: 400;
         color: #FBE9E7 !important;
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

     footer .d-flex.gap-2 a {
         font-size: 1.8rem !important;
         transition: transform 0.3s ease;
     }

     footer .d-flex.gap-2 a:hover {
         transform: translateY(-3px);
         color: #FF8A00 !important;
     }

     footer .text-white-50 {
         color: rgba(251, 233, 231, 0.6) !important;
         margin-top: 2rem !important;
         font-size: 0.85rem;
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

         .hero-about h1 {
             font-size: 2.8rem;
         }

         .hero-about p {
             font-size: 1.1rem;
         }

         .about-section-intro h2 {
             font-size: 2.2rem;
         }

         .about-card {
             padding: 2rem 1rem;
         }

         .about-card .icon-wrapper {
             font-size: 3rem;
         }

         .about-card h5 {
             font-size: 1.4rem;
         }
     }

     @media (max-width: 768px) {
         .hero-about {
             min-height: 350px;
         }

         .hero-about h1 {
             font-size: 2.2rem;
         }

         .hero-about p {
             font-size: 1rem;
         }

         .about-section-intro {
             padding: 3rem 0;
         }

         .about-section-intro h2 {
             font-size: 2rem;
         }

         .about-card {
             margin-bottom: 1.5rem;
             /* Space between cards on mobile */
         }
     }

     /* ================= Animasi Halaman Tentang ================= */

     /* Hero section muncul dari fade + zoom */
     .hero-about h1,
     .hero-about p {
         opacity: 0;
         transform: scale(0.9);
         animation: fadeZoomIn 0.8s ease forwards;
     }

     .hero-about h1 {
         animation-delay: 0.2s;
     }

     .hero-about p {
         animation-delay: 0.4s;
     }

     @keyframes fadeZoomIn {
         to {
             opacity: 1;
             transform: scale(1);
         }
     }

     /* Bagian intro muncul dari bawah */
     .about-section-intro h2,
     .about-section-intro p,
     .about-section-intro img {
         opacity: 0;
         transform: translateY(30px);
         animation: fadeUp 0.7s ease forwards;
     }

     .about-section-intro img {
         animation-delay: 0.2s;
     }

     .about-section-intro h2 {
         animation-delay: 0.4s;
     }

     .about-section-intro p {
         animation-delay: 0.6s;
     }

     @keyframes fadeUp {
         to {
             opacity: 1;
             transform: translateY(0);
         }
     }

     /* Card muncul bergantian dengan efek zoom */
     .about-card {
         opacity: 0;
         transform: translateY(20px) scale(0.95);
         animation: cardIn 0.6s ease forwards;
     }

     .about-card:nth-child(1) {
         animation-delay: 0.2s;
     }

     .about-card:nth-child(2) {
         animation-delay: 0.3s;
     }

     .about-card:nth-child(3) {
         animation-delay: 0.4s;
     }

     .about-card:nth-child(4) {
         animation-delay: 0.5s;
     }

     .about-card:nth-child(5) {
         animation-delay: 0.6s;
     }

     .about-card:nth-child(6) {
         animation-delay: 0.7s;
     }

     @keyframes cardIn {
         to {
             opacity: 1;
             transform: translateY(0) scale(1);
         }
     }

     /* CTA (button ajakan menu) muncul dengan bounce halus */
     .about-section-intro .btn {
         opacity: 1;
         /* langsung kelihatan */
         animation: bounceIn 0.5s ease;
     }

     @keyframes bounceIn {
         0% {
             opacity: 0;
             transform: scale(0.8);
         }

         60% {
             opacity: 1;
             transform: scale(1.05);
         }

         100% {
             transform: scale(1);
         }
     }


     .hero-about {
         background-image: url('../img/restoran.jpg');
         background-size: cover;
         background-position: center;
         position: relative;
         min-height: 450px;
         display: flex;
         align-items: center;
         justify-content: center;
         color: white;
         text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);

         /* animasi */
         animation: bgZoomIn 2s ease forwards;
     }

     @keyframes bgZoomIn {
         from {
             transform: scale(1.1);
             /* sedikit diperbesar */
             opacity: 0;
         }

         to {
             transform: scale(1);
             /* normal */
             opacity: 1;
         }
     }
 </style>