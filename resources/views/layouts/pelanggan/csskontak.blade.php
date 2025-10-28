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

     /* --- Kontak Section Specific Styles --- */
     .section-title {
         font-size: 2.8rem;
         /* Ukuran judul lebih besar */
         color: #3E2723;
         /* Dark Brown */
         text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
         font-family: 'Playfair Display', serif;
         /* Font elegan untuk judul */
     }

     .text-brown-custom {
         /* Mengganti text-brown */
         color: #3E2723 !important;
         /* Dark Brown */
     }

     .icon-box {
         background-color: rgba(255, 179, 0, 0.1);
         /* Latar belakang icon box dari palet */
         border-radius: 50%;
         padding: 15px;
         font-size: 1.5rem;
         color: #FFB300;
         /* Warna ikon dari palet */
         display: inline-flex;
         align-items: center;
         justify-content: center;
         width: 60px;
         /* Ukuran sedikit lebih besar */
         height: 60px;
         /* Ukuran sedikit lebih besar */
         box-shadow: 0 4px 10px rgba(255, 179, 0, 0.2);
         /* Bayangan untuk icon box */
         transition: all 0.3s ease;
     }

     .icon-box:hover {
         background-color: #FFB300;
         color: white;
         transform: translateY(-3px);
         box-shadow: 0 6px 15px rgba(255, 179, 0, 0.4);
     }

     .contact-info-text {
         color: #A1887F;
         /* Medium Brown */
         font-size: 1.05rem;
     }

     .contact-info-text strong {
         color: #3E2723;
         /* Dark Brown */
     }

     .contact-card {
         background: rgba(255, 255, 255, 0.9);
         /* Sedikit lebih solid */
         backdrop-filter: blur(10px);
         border-radius: 20px;
         box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
         /* Bayangan lebih kuat */
         padding: 40px;
         /* Padding lebih banyak */
         border: 1px solid rgba(255, 179, 0, 0.2);
     }

     input.form-control,
     textarea.form-control {
         border-radius: 10px !important;
         border: 1px solid #FFB300 !important;
         /* Border orange */
         padding: 12px 20px;
         /* Padding lebih banyak */
         background-color: #FBE9E7;
         /* Krem untuk input background */
         color: #3E2723;
         /* Dark Brown untuk teks input */
     }

     input.form-control::placeholder,
     textarea.form-control::placeholder {
         color: #A1887F;
         /* Medium Brown untuk placeholder */
         opacity: 0.8;
     }

     input.form-control:focus,
     textarea.form-control:focus {
         border-color: #FF8A00 !important;
         /* Orange cerah saat fokus */
         box-shadow: 0 0 0 0.25rem rgba(255, 179, 0, 0.25) !important;
         background-color: white;
         /* Putih saat fokus */
     }

     .btn-brand {
         /* Mengganti btn-brown */
         background-color: #FFB300 !important;
         border: none !important;
         color: #3E2723 !important;
         /* Teks Dark Brown pada tombol */
         font-weight: 600;
         /* Semi-bold */
         padding: 12px 30px !important;
         border-radius: 30px !important;
         /* Lebih bulat */
         transition: all 0.3s ease;
         box-shadow: 0 4px 10px rgba(255, 179, 0, 0.4);
     }

     .btn-brand:hover {
         background-color: #FF8A00 !important;
         /* Oranye cerah saat hover */
         color: white !important;
         /* Teks putih saat hover */
         transform: translateY(-2px);
         box-shadow: 0 6px 15px rgba(255, 179, 0, 0.6);
     }

     /* --- Footer Styles --- */
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

         /* Adjust breakpoint for navbar collapse */
         .navbar-brand img {
             height: 60px;
             /* Make logo smaller on mobile */
         }

         .navbar-collapse {
             text-align: center;
             /* Center nav links on mobile */
         }

         .navbar-nav .nav-link {
             padding: 8px 15px !important;
             /* Adjust padding for mobile links */
         }

         .navbar-nav {
             margin-top: 15px;
             /* Space between toggler and links */
             margin-bottom: 15px;
         }

         .d-flex.align-items-center.gap-3 {
             /* Avatar and Cart icons only now */
             flex-direction: row;
             /* Keep horizontal */
             justify-content: center;
             /* Center them */
             width: 100%;
             margin-right: 0 !important;
             /* Remove right margin */
             margin-top: 15px;
             /* Add some space if nav links are stacked */
         }

         .avatar-icon,
         .cart-icon {
             margin: 0 8px;
             /* Space between icons */
         }

         .search-bar {
             /* Hide search bar if it were somehow still present */
             display: none;
         }
     }

     @media (max-width: 768px) {
         .section-title {
             font-size: 2.2rem;
         }

         .icon-box {
             width: 50px;
             height: 50px;
             font-size: 1.3rem;
         }

         .contact-info-text {
             font-size: 0.95rem;
         }

         .contact-card {
             padding: 30px;
         }

         footer .col-md-4,
         footer .col-md-2,
         footer .col-md-3 {
             margin-bottom: 20px;
             /* Add space between columns */
             text-align: center;
             /* Center content in footer columns */
         }

         footer .d-flex.gap-2 {
             justify-content: center;
             /* Center social icons */
         }

         footer .list-unstyled {
             padding-left: 0;
             /* Remove default ul padding */
         }
     }

     /* --- ANIMASI KEREN UNTUK KONTAK --- */

     /* Supaya seluruh section muncul smooth */
     section.container.py-5 {
         opacity: 0;
         transform: translateY(30px);
         animation: sectionFadeIn 0.8s ease forwards;
     }

     @keyframes sectionFadeIn {
         to {
             opacity: 1;
             transform: translateY(0);
         }
     }

     /* Judul & Info Kontak (kiri) */
     .col-md-5 {
         opacity: 0;
         transform: translateX(-50px);
         animation: fadeInLeft 1s ease forwards;
         animation-delay: 0.3s;
     }

     @keyframes fadeInLeft {
         to {
             opacity: 1;
             transform: translateX(0);
         }
     }

     /* Form Kontak (kanan) */
     .col-md-7 {
         opacity: 0;
         transform: translateX(50px);
         animation: fadeInRight 1s ease forwards;
         animation-delay: 0.5s;
     }

     @keyframes fadeInRight {
         to {
             opacity: 1;
             transform: translateX(0);
         }
     }

     /* Icon Box (alamat, telepon, email, instagram) */
     .icon-box {
         opacity: 1;
         /* Biar default tetap muncul */
         animation: fadeInUp 0.5s ease both;
     }

     .icon-box:nth-child(1) {
         animation-delay: 0.6s;
     }

     .icon-box:nth-child(2) {
         animation-delay: 0.8s;
     }

     .icon-box:nth-child(3) {
         animation-delay: 1s;
     }

     .icon-box:nth-child(4) {
         animation-delay: 1.2s;
     }

     @keyframes bounceIn {
         0% {
             opacity: 0;
             transform: scale(0.5);
         }

         60% {
             opacity: 1;
             transform: scale(1.1);
         }

         100% {
             transform: scale(1);
         }
     }

     /* Tombol Kirim */
     .btn-brand {
         opacity: 0;
         transform: scale(0.8);
         animation: zoomInBtn 0.6s ease forwards;
         animation-delay: 1.4s;
     }

     @keyframes zoomInBtn {
         to {
             opacity: 1;
             transform: scale(1);
         }
     }
 </style>
