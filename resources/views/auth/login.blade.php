<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dapur Afdhol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/img/background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            position: relative;
            overflow: hidden; /* Mencegah scrollbar muncul saat animasi */
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 252, 251, 0.3); /* Initial state untuk animasi */
            z-index: 1;
        }

        .login-container {
            background-color: rgba(84, 57, 47, 1.0);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 400px;
            width: 90%;
            position: relative;
            z-index: 2;
        }

        .login-container h2 {
            color: #FFB300;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .login-container .form-control {
            border-radius: 5px;
            padding: 12px 15px;
            border: 1px solid #FFB300;
            background-color: rgba(251, 233, 231, 0.95);
            color: #3E2723;
        }

        .login-container .form-control::placeholder {
            color: #A1887F;
        }

        .login-container .btn-primary {
            background-color: #FF8A00;
            border-color: #FF8A00;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.1em;
            font-weight: bold;
            margin-top: 20px;
        }

        .login-container .btn-primary:hover {
            background-color: #E67A00;
            border-color: #E67A00;
        }

        .login-container .logo {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.3));
        }

        .login-container p {
            color: #FBE9E7;
            margin-top: 20px;
        }

        .login-container a {
            color: #FFB300;
            text-decoration: none;
            font-weight: bold;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        /* Tombol panah kembali */
        .btn-back {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: #FF8A00;
            color: #fff;
            border-radius: 50%;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 18px;
            z-index: 3; /* Pastikan tombol kembali di atas overlay */
        }

        .btn-back:hover {
            background-color: #E67A00;
            color: #fff;
        }

        /* --- ANIMASI START --- */

        /* Keyframes untuk efek fade-in dari bawah */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Keyframes untuk efek fade-in dan sedikit scale */
        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Keyframes untuk efek fade-in background overlay */
        @keyframes fadeInOverlay {
            from {
                background-color: rgba(255, 252, 251, 0);
            }
            to {
                background-color: rgba(255, 252, 251, 0.3);
            }
        }


        /* Aplikasikan animasi ke body overlay */
        body::before {
            animation: fadeInOverlay 1s ease-out forwards;
        }

        /* Base class untuk elemen yang akan dianimasikan */
        .animated-item {
            opacity: 0; /* Sembunyikan elemen secara default */
            animation-fill-mode: forwards; /* Pastikan state akhir animasi tetap terjaga */
        }

        /* Animasi untuk login container */
        .login-container.animated-item {
            animation: fadeInScale 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
            transform: scale(0.95); /* Mulai sedikit lebih kecil */
        }

        /* Animasi untuk logo, judul, input, tombol, dan link */
        .login-container .logo.animated-item {
            animation: fadeInScale 0.6s ease-out forwards;
            animation-delay: 0.3s;
        }
        .login-container h2.animated-item {
            animation: fadeInUp 0.7s ease-out forwards;
            animation-delay: 0.5s;
        }
        .login-container .form-control.animated-item:nth-child(1) { /* Email input */
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 0.7s;
        }
        .login-container .form-control.animated-item:nth-child(2) { /* Password input */
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 0.9s;
        }
        .login-container .btn-primary.animated-item {
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 1.1s;
        }
        .login-container p.animated-item:nth-of-type(1) { /* Lupa kata sandi */
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 1.3s;
        }
        .login-container p.animated-item:nth-of-type(2) { /* Belum punya akun */
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 1.5s;
        }

        /* Animasi untuk tombol kembali */
        .btn-back.animated-item {
            animation: fadeInScale 0.5s ease-out forwards;
            animation-delay: 0.1s; /* Muncul paling awal */
        }

        /* --- ANIMASI END --- */
    </style>
</head>

<body>

    <div class="login-container animated-item">
        <a href="{{ url('/') }}" class="btn-back animated-item">
            <i class="bi bi-arrow-left"></i>
        </a>

        <img src="{{ asset('img/logo.png') }}" alt="Dapur Afdhol Logo" class="logo animated-item">
        <h2 class="animated-item">Selamat Datang!</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control animated-item" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control animated-item" placeholder="Kata Sandi" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 animated-item">Login</button>
        </form>
        <p class="animated-item"><a href="{{ route('password.request') }}">Lupa kata sandi?</a></p>
        <p class="animated-item">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    </div>

</body>

</html>