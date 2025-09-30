<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password – Dapur Afdhol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 252, 251, 0.3);
            z-index: 1;
        }

        .reset-container {
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

        .reset-container h2 {
            color: #FFB300;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .reset-container .form-control {
            border-radius: 5px;
            padding: 12px 15px;
            border: 1px solid #FFB300;
            background-color: rgba(251, 233, 231, 0.95);
            color: #3E2723;
        }

        .reset-container .form-control::placeholder {
            color: #A1887F;
        }

        .reset-container .btn-primary {
            background-color: #FF8A00;
            border-color: #FF8A00;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.1em;
            font-weight: bold;
            margin-top: 20px;
        }

        .reset-container .btn-primary:hover {
            background-color: #E67A00;
            border-color: #E67A00;
        }

        .reset-container .logo {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.3));
        }

        .reset-container p {
            color: #FBE9E7;
            margin-top: 20px;
        }

        .reset-container a {
            color: #FFB300;
            text-decoration: none;
            font-weight: bold;
        }

        .reset-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="reset-container">
        <img src="{{ asset('img/logo.png') }}" alt="Dapur Afdhol Logo" class="logo">
        <h2>Reset Kata Sandi</h2>

        {{-- Pesan error --}}
        @if ($errors->any())
            <div class="alert alert-danger text-start">
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            {{-- Token wajib ada --}}
            <input type="hidden" name="token" value="{{ $token }}">

            {{-- Email --}}
            <div class="mb-3">
                <input type="email" name="email" class="form-control"
                    placeholder="Masukkan email anda" value="{{ old('email') }}" required autofocus>
            </div>

            {{-- Password Baru --}}
            <div class="mb-3">
                <input type="password" name="password" class="form-control"
                    placeholder="Password baru" required>
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control"
                    placeholder="Konfirmasi password baru" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
        </form>

        <p><a href="{{ route('login') }}">Kembali ke Login</a></p>
    </div>
</body>

</html>
