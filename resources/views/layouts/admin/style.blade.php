<style>
    /* Palet Warna Dapur Afdhol (Konsisten) */
    :root {
        --dark-brown: #3E2723;
        --medium-brown: #A1887F;
        --light-brown: #FBE9E7;
        --darkest-brown: #6D4C41;
        --orange-primary: #FFB300;
        --orange-hover: #FF8A00;
        --orange-darker: #E67A00;
        --white: #ffffff;
        --soft-gray: #f8f9fa;
        --red-delete: #dc3545;
        --green-available: #28a745;
        --gray-unavailable: #6c757d;
    }

    body {
        font-family: 'Poppins', sans-serif;
        color: var(--dark-brown);
        background-color: var(--light-brown);
        display: flex;
        min-height: 100vh;
        margin: 0;
        overflow-x: hidden;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Playfair Display', serif;
        color: var(--dark-brown);
    }

    .btn-primary-custom {
        background-color: var(--orange-hover);
        border-color: var(--orange-hover);
        color: white;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
        background-color: var(--orange-darker);
        border-color: var(--orange-darker);
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    }

    .btn-outline-custom {
        border: 2px solid var(--orange-hover);
        color: var(--orange-hover);
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-outline-custom:hover {
        background-color: var(--orange-hover);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    }

    .btn-sm {
        padding: 6px 12px;
        font-size: 0.85rem;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        min-width: 250px;
        background-color: var(--darkest-brown);
        color: var(--white);
        padding: 20px;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        position: fixed;
        height: 100%;
        overflow-y: auto;
        transition: all 0.3s ease;
        z-index: 1000;
    }

    .sidebar.collapsed {
        width: 80px;
        min-width: 80px;
    }

    /* Sidebar header logo */
    .sidebar-header {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar-header h3 {
        display: none;
        /* sembunyikan teks lama */
    }

    .sidebar-logo {
        width: 120px;
        /* sesuaikan ukuran logo */
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .sidebar-menu .list-group-item {
        background-color: transparent;
        color: var(--light-brown);
        border: none;
        padding: 12px 15px;
        font-weight: 500;
        border-radius: 5px;
        margin-bottom: 5px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    .sidebar-menu .list-group-item i {
        font-size: 1.2rem;
        margin-right: 15px;
        transition: margin 0.3s ease;
        min-width: 25px;
        text-align: center;
    }

    .sidebar.collapsed .sidebar-menu .list-group-item i {
        margin-right: 0;
    }

    .sidebar-menu .list-group-item span {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: opacity 0.3s ease;
    }

    .sidebar.collapsed .sidebar-menu .list-group-item span {
        opacity: 0;
        width: 0;
        display: none;
    }

    .sidebar-menu .list-group-item:hover,
    .sidebar-menu .list-group-item.active {
        background-color: rgba(255, 179, 0, 0.2);
        color: var(--orange-primary);
    }

    .sidebar-menu .list-group-item.active {
        font-weight: 600;
    }

    /* Main content */
    .main-content {
        flex-grow: 1;
        margin-left: 250px;
        transition: margin-left 0.3s ease;
        padding-top: 75px;
        position: relative;
    }

    .main-content.expanded {
        margin-left: 80px;
    }

    /* Navbar */
    .admin-navbar {
        background-color: var(--white);
        padding: 15px 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        position: fixed;
        width: calc(100% - 250px);
        top: 0;
        left: 250px;
        z-index: 999;
        transition: width 0.3s ease, left 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .admin-navbar.expanded {
        width: calc(100% - 80px);
        left: 80px;
    }

    .admin-navbar .nav-link {
        color: var(--dark-brown);
        margin-left: 15px;
        font-size: 1.1rem;
        transition: color 0.3s ease;
    }

    .admin-navbar .nav-link:hover {
        color: var(--orange-primary);
    }

    .admin-navbar .toggle-btn {
        background: transparent;
        border: none;
        font-size: 1.5rem;
        color: var(--dark-brown);
        cursor: pointer;
    }

    .admin-panel-title {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        white-space: nowrap;
    }

    .content-padding {
        padding: 25px;
    }

    /* Card */
    .admin-card {
        background-color: var(--white);
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        padding: 25px;
        margin-bottom: 25px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .admin-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
    }

    .admin-card-header {
        border-bottom: 1px solid var(--light-brown);
        padding-bottom: 15px;
        margin-bottom: 20px;
        color: var(--dark-brown);
        font-size: 1.5rem;
        font-family: 'Playfair Display', serif;
        font-weight: 700;
    }

    /* Table */
    .table-custom {
        border-collapse: separate;
        border-spacing: 0 10px;
        width: 100%;
    }

    .table-custom th {
        background-color: var(--darkest-brown);
        color: var(--white);
        padding: 12px 15px;
        font-weight: 600;
        text-align: left;
        border: none;
    }

    .table-custom td {
        background-color: var(--soft-gray);
        padding: 12px 15px;
        vertical-align: middle;
        border: none;
    }

    .table-custom tbody tr {
        transition: all 0.2s ease;
    }

    .table-custom tbody tr:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
        background-color: var(--light-brown);
    }

    .menu-thumbnail {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 5px;
    }

    /* Pagination */
    .pagination .page-item .page-link {
        border-radius: 5px;
        margin: 0 3px;
        color: var(--dark-brown);
        border-color: var(--medium-brown);
        transition: all 0.2s ease;
    }

    .pagination .page-item .page-link:hover {
        background-color: var(--orange-primary);
        border-color: var(--orange-primary);
        color: white;
    }

    .pagination .page-item.active .page-link {
        background-color: var(--orange-primary);
        border-color: var(--orange-primary);
        color: white;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .form-control-filter {
        border-radius: 8px;
        border: 1px solid var(--medium-brown);
        padding: 8px 12px;
        color: var(--dark-brown);
        background-color: var(--white);
    }

    .form-control-filter:focus {
        border-color: var(--orange-primary);
        box-shadow: 0 0 0 0.25rem rgba(255, 179, 0, 0.25);
    }

    /* Modal */
    .modal-content {
        border-radius: 10px;
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .modal-header {
        background-color: var(--orange-primary);
        color: var(--darkest-brown);
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom: none;
    }

    .modal-header .btn-close {
        filter: invert(1);
    }

    .modal-footer {
        border-top: none;
        padding-top: 0;
    }

    /* Media Queries */
    @media (max-width: 992px) {
        .sidebar {
            width: 80px;
            min-width: 80px;
        }

        .sidebar-header h3 {
            opacity: 0;
            width: 0;
            padding: 0;
            margin: 0;
            height: 0;
        }

        .sidebar-menu .list-group-item span {
            opacity: 0;
            width: 0;
            display: none;
        }

        .sidebar-menu .list-group-item i {
            margin-right: 0;
        }

        .main-content {
            margin-left: 80px;
            padding-top: 75px;
        }

        .admin-navbar {
            width: calc(100% - 80px);
            left: 80px;
        }

        .sidebar-toggle-btn {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            left: -250px;
            box-shadow: none;
            z-index: 1000;
            width: 250px;
            min-width: 250px;
        }

        .sidebar.show {
            left: 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        }

        .sidebar.collapsed .sidebar-header h3,
        .sidebar.collapsed .sidebar-menu .list-group-item span {
            opacity: 1;
            width: auto;
            display: inline-block;
        }

        .sidebar.collapsed .sidebar-menu .list-group-item i {
            margin-right: 15px;
        }

        .main-content {
            margin-left: 0;
            width: 100%;
            padding-top: 75px;
        }

        .admin-navbar {
            width: 100%;
            left: 0;
        }

        .sidebar-toggle-btn {
            display: block;
        }

        .admin-panel-title {
            font-size: 1.2rem;
            position: static;
            transform: none;
            flex-grow: 1;
            text-align: center;
        }

        .table-responsive-custom {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-custom {
            width: 100%;
            min-width: 700px;
        }
    }

    /* Sidebar default muncul */
    .sidebar {
        width: 250px;
        transition: all 0.3s ease;
    }

    /* Sidebar tertutup */
    .sidebar.closed {
        margin-left: -250px;
    }

    /* Biar konten ikut geser */
    .main-content {
        transition: all 0.3s ease;
        margin-left: 250px;
    }

    .main-content.expanded {
        margin-left: 0;
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


    /* ============================ */
    /* Animasi Admin Card Dashboard */
    /* ============================ */

    .admin-card {
        opacity: 0;
        transform: translateY(20px) scale(0.95);
        animation: fadeSlideUp 0.6s ease forwards;
    }

    /* Staggered effect tiap card di row */
    .row.g-4.mb-4>.col-md-4:nth-child(1) .admin-card {
        animation-delay: 0.1s;
    }

    .row.g-4.mb-4>.col-md-4:nth-child(2) .admin-card {
        animation-delay: 0.25s;
    }

    .row.g-4.mb-4>.col-md-4:nth-child(3) .admin-card {
        animation-delay: 0.4s;
    }

    /* Pesanan terbaru card */
    .admin-card.mb-4 {
        opacity: 0;
        transform: translateY(20px) scale(0.97);
        animation: fadeSlideUp 0.7s ease forwards;
        animation-delay: 0.6s;
    }

    /* Hover effect super smooth */
    .admin-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
        transition: all 0.3s ease;
    }

    /* Keyframes animasi */
    @keyframes fadeSlideUp {
        0% {
            opacity: 0;
            transform: translateY(20px) scale(0.95);
        }

        60% {
            opacity: 0.7;
            transform: translateY(-5px) scale(1.03);
        }

        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Animasi tabel hover */
    .table-custom tbody tr {
        transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
    }

    .table-custom tbody tr:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        background-color: #fff8e1;
        /* Oranye soft glow */
    }

    /* Opsional: animasi ikon header (Jumlah Menu, Pengguna, Pesanan Terbaru) */
    .admin-card i {
        display: inline-block;
        transform: scale(0.8);
        opacity: 0;
        animation: iconBounce 0.6s ease forwards;
    }

    .row.g-4.mb-4>.col-md-4:nth-child(1) .admin-card i {
        animation-delay: 0.2s;
    }

    .row.g-4.mb-4>.col-md-4:nth-child(2) .admin-card i {
        animation-delay: 0.35s;
    }

    .row.g-4.mb-4>.col-md-4:nth-child(3) .admin-card i {
        animation-delay: 0.5s;
    }

    @keyframes iconBounce {
        0% {
            transform: scale(0.8) translateY(-20px);
            opacity: 0;
        }

        50% {
            transform: scale(1.1) translateY(5px);
            opacity: 0.7;
        }

        100% {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
    }

    /* ============================ */
    /* Animasi Muncul Dari Kiri     */
    /* ============================ */
    @keyframes fadeInLeft {
        0% {
            opacity: 0;
            transform: translateX(-30px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Untuk semua admin-card */
    .admin-card {
        animation: fadeInLeft 0.5s ease forwards;
    }

    /* Staggered effect untuk row tabel */
    .table-custom tbody tr {
        opacity: 0;
        animation: fadeInLeft 0.5s ease forwards;
    }

    .table-custom tbody tr:nth-child(1) {
        animation-delay: 0.05s;
    }

    .table-custom tbody tr:nth-child(2) {
        animation-delay: 0.1s;
    }

    .table-custom tbody tr:nth-child(3) {
        animation-delay: 0.15s;
    }

    .table-custom tbody tr:nth-child(4) {
        animation-delay: 0.2s;
    }

    .table-custom tbody tr:nth-child(5) {
        animation-delay: 0.25s;
    }

    .table-custom tbody tr:nth-child(6) {
        animation-delay: 0.3s;
    }

    .table-custom tbody tr:nth-child(7) {
        animation-delay: 0.35s;
    }

    .table-custom tbody tr:nth-child(8) {
        animation-delay: 0.4s;
    }

    /* Bisa tambahkan nth-child lebih banyak sesuai kebutuhan */

    /* Untuk kartu summary di laporan / dashboard */
    .row .card,
    .row .admin-card {
        opacity: 0;
        animation: fadeInLeft 0.5s ease forwards;
    }

    .row .card:nth-child(1),
    .row .admin-card:nth-child(1) {
        animation-delay: 0.05s;
    }

    .row .card:nth-child(2),
    .row .admin-card:nth-child(2) {
        animation-delay: 0.1s;
    }

    .row .card:nth-child(3),
    .row .admin-card:nth-child(3) {
        animation-delay: 0.15s;
    }

    .row .card:nth-child(4),
    .row .admin-card:nth-child(4) {
        animation-delay: 0.2s;
    }

    /* Opsional: animasi hover tetap smooth */
    .admin-card:hover,
    .table-custom tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
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

    
</style>