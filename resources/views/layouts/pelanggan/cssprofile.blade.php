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



    /* Header Styles */
    header {
        width: 100%;
        max-width: 960px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-left: 1.5rem;
        padding-right: 1.5rem;
        margin-bottom: 3rem;
    }

    header a {
        text-decoration: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1.125rem;
        transition: color 0.2s ease-in-out;
    }

    header .back-link {
        color: #6D4C41;
        /* Cokelat Gelap */
    }

    header .back-link:hover {
        color: #3E2723;
        /* Teks Utama */
    }

    header .logout-link {
        color: #E67A00;
        /* Oranye Gelap */
    }

    header .logout-link:hover {
        color: #FF8A00;
        /* Oranye Cerah */
    }

    /* Success Message */
    .alert-custom-success {
        width: 100%;
        max-width: 960px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        background-color: #e8f5e9;
        /* Light green */
        border: 1px solid #4CAF50;
        /* Green */
        color: #2e7d32;
        /* Dark green */
        border-radius: 0.75rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .alert-custom-success button {
        background: none;
        border: none;
        font-size: 1.5rem;
        line-height: 1;
        color: #2e7d32;
        cursor: pointer;
    }

    .alert-custom-success button:hover {
        color: #1b5e20;
    }

    /* Main Content Wrapper */
    .main-wrapper {
        width: 100%;
        max-width: 960px;
        background-color: white;
        border-radius: 1.5rem;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        padding: 3rem;
        display: flex;
        flex-direction: column;
        /* Stack sections vertically */
        gap: 3rem;
        /* Spacing between main sections */
    }

    /* Top Section: Horizontal Profile Edit */
    .profile-edit-section {
        display: grid;
        grid-template-columns: 1fr;
        /* Default for mobile */
        gap: 3rem;
    }

    @media (min-width: 768px) {

        /* md breakpoint: 2 columns */
        .profile-edit-section {
            grid-template-columns: 1fr 2fr;
            /* 1/3 for avatar, 2/3 for form */
        }
    }

    /* Avatar Section */
    .avatar-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2rem;
    }

    .avatar-placeholder {
        width: 192px;
        height: 192px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
        font-weight: 800;
        color: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        background-color: #8D6E63;
        /* Cokelat Sedang */
    }

    .avatar-glow {
        box-shadow: 0 0 15px 4px #FFB300;
        /* Oranye/Kuning */
        transition: box-shadow 0.3s ease-in-out;
    }

    .avatar-glow:hover {
        box-shadow: 0 0 25px 6px #FF8A00;
        /* Oranye Cerah */
    }

    .avatar-img {
        width: 192px;
        height: 192px;
        border-radius: 50%;
        object-fit: cover;
        cursor: pointer;
        border: 3px solid #FFB300;
    }

    /* Form Buttons */
    .btn-custom {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        font-weight: 600;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.2s ease-in-out;
        width: 100%;
        max-width: 250px;
        text-decoration: none;
    }

    .btn-upload {
        background-color: #fff3e0;
        /* Light orange for upload */
        color: #FFB300;
        border: 1px solid #FFB300;
    }

    .btn-upload:hover {
        background-color: #ffe0b2;
        color: #E67A00;
        border-color: #E67A00;
    }

    .btn-delete {
        background-color: #EF5350;
        /* Red */
        color: white;
        border: 1px solid #EF5350;
    }

    .btn-delete:hover {
        background-color: #E53935;
        border-color: #E53935;
    }

    /* Edit Profile Section */
    .edit-profile-form-section h2 {
        font-size: 2.25rem;
        font-weight: 800;
        color: #6D4C41;
        /* Cokelat Gelap */
        margin-bottom: 2rem;
        border-bottom: 4px solid #FFB300;
        padding-bottom: 0.5rem;
        text-align: left;
    }

    /* Floating Label Styles */
    .floating-label {
        position: relative;
        margin-bottom: 1.75rem;
    }

    .floating-label input {
        border: 2px solid #A1887F;
        /* Teks Sekunder/Placeholder */
        border-radius: 0.75rem;
        padding: 1rem;
        width: 100%;
        font-size: 1rem;
        background: transparent;
        outline: none;
        transition: border-color 0.3s;
        color: #3E2723;
    }

    .floating-label input:focus {
        border-color: #FFB300;
        /* Oranye/Kuning */
    }

    .floating-label label {
        position: absolute;
        top: 1rem;
        left: 1rem;
        color: #A1887F;
        pointer-events: none;
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .floating-label input:focus+label,
    .floating-label input:not(:placeholder-shown)+label {
        top: -0.5rem;
        left: 1rem;
        font-size: 0.75rem;
        color: #FFB300;
        background: white;
        padding: 0 0.25rem;
    }

    /* Save Button */
    .btn-save {
        width: 100%;
        background-color: #FFB300;
        color: #3E2723;
        padding: 1rem 0;
        border-radius: 1rem;
        font-size: 1.125rem;
        font-weight: 800;
        box-shadow: 0 6px 15px rgba(255, 179, 0, 0.5);
        transition: background-color 0.2s ease-in-out;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.75rem;
        border: none;
    }

    .btn-save:hover {
        background-color: #FF8A00;
        color: #3E2723;
        box-shadow: 0 8px 20px rgba(255, 179, 0, 0.6);
    }

    /* Section Headers (for Social Media) */
    .section-header {
        font-size: 1.75rem;
        /* Slightly smaller than main h2 */
        font-weight: 700;
        color: #6D4C41;
        margin-bottom: 1.5rem;
        border-bottom: 2px solid #FFB300;
        /* Thinner line */
        padding-bottom: 0.25rem;
    }

    /* Social Media Section */
    .social-media-section {
        text-align: center;
    }

    .social-media-section h3 {
        margin-bottom: 1.5rem;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        /* Adjust gap between icons */
    }

    .social-icons a {
        font-size: 2.5rem;
        /* Larger icons */
        color: #6D4C41;
        /* Dark Brown for icons */
        transition: color 0.2s ease-in-out;
        text-decoration: none;
        /* Remove underline for links */
    }

    .social-icons a:hover {
        color: #FFB300;
        /* Accent color on hover */
    }

    /* Footer */
    footer {
        margin-top: 5rem;
        margin-bottom: 2.5rem;
        text-align: center;
        color: #A1887F;
        font-weight: 600;
        user-select: none;
    }

    /* Utility for d-none in Bootstrap */
    .d-none {
        display: none !important;
    }

    /* Animasi muncul dari atas */
    @keyframes slideInTop {
        0% {
            opacity: 0;
            transform: translateY(-30px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Avatar */
    .card-body>.mb-4 {
        opacity: 0;
        animation: slideInTop 0.5s forwards;
        animation-delay: 0.1s;
    }

    /* Tombol ganti/hapus foto */
    .card-body .btn-outline-warning,
    .card-body .btn-outline-danger {
        opacity: 0;
        animation: slideInTop 0.5s forwards;
        animation-delay: 0.2s;
    }

    /* Form fields */
    .edit-profile-form-section .form-control,
    .edit-profile-form-section .form-label {
        opacity: 0;
        animation: slideInTop 0.5s forwards;
    }

    /* Staggered delay untuk tiap input field */
    #profileForm .mb-3:nth-child(1) input,
    #profileForm .mb-3:nth-child(1) label {
        animation-delay: 0.3s;
    }

    #profileForm .mb-3:nth-child(2) input,
    #profileForm .mb-3:nth-child(2) label {
        animation-delay: 0.4s;
    }

    #profileForm .mb-3:nth-child(3) input,
    #profileForm .mb-3:nth-child(3) label {
        animation-delay: 0.5s;
    }

    #profileForm .mb-4 input,
    #profileForm .mb-4 label {
        animation-delay: 0.6s;
    }

    /* Tombol simpan */
    #profileForm button.btn-warning {
        opacity: 0;
        animation: slideInTop 0.5s forwards;
        animation-delay: 0.7s;
    }

    /* Social media */
    .social-media-section {
        opacity: 0;
        animation: slideInTop 0.5s forwards;
        animation-delay: 0.8s;
    }

    .social-icons a {
        opacity: 0;
        animation: slideInTop 0.5s forwards;
    }

    .social-icons a:nth-child(1) {
        animation-delay: 0.85s;
    }

    .social-icons a:nth-child(2) {
        animation-delay: 0.9s;
    }

    .social-icons a:nth-child(3) {
        animation-delay: 0.95s;
    }

    /* Animasi muncul dari atas */
    @keyframes slideInTop {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Target form dan anak input + button */
    #profileForm .mb-3,
    #profileForm .mb-4,
    #profileForm .d-grid {
        opacity: 0;
        animation: slideInTop 0.5s forwards;
    }

    /* Delay bertahap sesuai urutan visual */
    #profileForm .mb-3:nth-of-type(1) {
        animation-delay: 0.1s;
    }

    /* Nama */
    #profileForm .mb-3:nth-of-type(2) {
        animation-delay: 0.2s;
    }

    /* Email */
    #profileForm .mb-3:nth-of-type(3) {
        animation-delay: 0.3s;
    }

    /* No Telepon */
    #profileForm .mb-4 {
        animation-delay: 0.4s;
    }

    /* Password */
    #profileForm .d-grid {
        animation-delay: 0.5s;
    }

    /* 🌸 Background utama halaman checkout */
    body {
        background-color: #FBE9E7 !important;
    }


    /* 🔹 Pastikan avatar tetap proporsional */
    .card-body img.rounded-circle,
    .card-body .rounded-circle {
        width: 150px;
        height: 150px;
        object-fit: cover;
        transition: 0.3s ease-in-out;
    }

    /* 🔹 Hover animasi ringan */
    .card-body img.rounded-circle:hover {
        transform: scale(1.03);
    }

    /* 🔹 Responsif untuk layar kecil */
    @media (max-width: 768px) {

        .card-body img.rounded-circle,
        .card-body .rounded-circle {
            width: 120px !important;
            height: 120px !important;
        }
    }

    @media (max-width: 576px) {

        .card-body img.rounded-circle,
        .card-body .rounded-circle {
            width: 100px !important;
            height: 100px !important;
        }
    }
</style>
