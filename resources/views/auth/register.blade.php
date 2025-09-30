<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Dapur Afdhol</title>
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

        .register-container {
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

        .register-container h2 {
            color: #FFB300;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .register-container .form-control {
            border-radius: 5px;
            padding: 12px 15px;
            border: 1px solid #FFB300;
            background-color: rgba(251, 233, 231, 0.95);
            color: #3E2723;
        }

        .register-container .form-control::placeholder {
            color: #A1887F;
        }

        .register-container .btn-primary {
            background-color: #FF8A00;
            border-color: #FF8A00;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.1em;
            font-weight: bold;
            margin-top: 20px;
        }

        .register-container .btn-primary:hover {
            background-color: #E67A00;
            border-color: #E67A00;
        }

        .register-container p {
            color: #FBE9E7;
            margin-top: 20px;
        }

        .register-container a {
            color: #FFB300;
            text-decoration: none;
            font-weight: bold;
        }

        .register-container a:hover {
            text-decoration: underline;
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
            opacity: 0;
            animation-fill-mode: forwards;
        }

        /* Animasi untuk register container */
        .register-container.animated-item {
            animation: fadeInScale 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
            transform: scale(0.95);
        }

        /* Animasi untuk judul, input, tombol, dan link */
        .register-container h2.animated-item {
            animation: fadeInUp 0.7s ease-out forwards;
            animation-delay: 0.3s;
        }
        
        /* Atur delay untuk setiap input field */
        .register-container form .mb-3:nth-child(1) .form-control {
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 0.5s;
        }
        .register-container form .mb-3:nth-child(2) .form-control {
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 0.7s;
        }
        .register-container form .mb-3:nth-child(3) .form-control {
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 0.9s;
        }
        .register-container form .mb-3:nth-child(4) .form-control {
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 1.1s;
        }
        .register-container form .mb-3:nth-child(5) .form-control {
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 1.3s;
        }

        .register-container .btn-primary.animated-item {
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 1.5s;
        }
        .register-container p.animated-item {
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 1.7s;
        }
        
        /* Opsi untuk kembali ke halaman sebelumnya (jika ada) */
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
            z-index: 3;
        }

        .btn-back:hover {
            background-color: #E67A00;
            color: #fff;
        }

        /* --- ANIMASI END --- */
    </style>
</head>

<body>

    <div class="register-container animated-item">
        
        <h2>Daftar Akun Baru</h2>

        {{-- Form Register hanya untuk Pelanggan --}}
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nama Pengguna" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <input type="text" name="no_telepon" class="form-control" placeholder="No. Telepon" value="{{ old('no_telepon') }}" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Kata Sandi" required>
            </div>

            {{-- Role otomatis pelanggan, tidak bisa pilih --}}
            <input type="hidden" name="role" value="pelanggan">

            <button type="submit" class="btn btn-primary w-100 animated-item">Daftar</button>
        </form>

        <p class="animated-item">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
        <p class="animated-item"><a href="{{ url('/') }}">Kembali ke Beranda</a></p>
    </div>
</body>

</html>