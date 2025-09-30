<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password – Dapur Afdhol</title>
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

        .forgot-container {
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

        .forgot-container h2 {
            color: #FFB300;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .forgot-container .form-control {
            border-radius: 5px;
            padding: 12px 15px;
            border: 1px solid #FFB300;
            background-color: rgba(251, 233, 231, 0.95);
            color: #3E2723;
        }

        .forgot-container .form-control::placeholder {
            color: #A1887F;
        }

        .forgot-container .btn-primary {
            background-color: #FF8A00;
            border-color: #FF8A00;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.1em;
            font-weight: bold;
            margin-top: 20px;
        }

        .forgot-container .btn-primary:hover {
            background-color: #E67A00;
            border-color: #E67A00;
        }

        .forgot-container .logo {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.3));
        }

        .forgot-container p {
            color: #FBE9E7;
            margin-top: 20px;
        }

        .forgot-container a {
            color: #FFB300;
            text-decoration: none;
            font-weight: bold;
        }

        .forgot-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="forgot-container">
        <img src="{{ asset('img/logo.png') }}" alt="Dapur Afdhol Logo" class="logo">
        <h2>Lupa Kata Sandi?</h2>

        {{-- Pesan sukses --}}
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        {{-- Pesan error --}}
        @if ($errors->any())
        <div class="alert alert-danger text-start">
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Masukkan email anda" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Kirim Link Reset</button>
        </form>

        <p><a href="{{ route('login') }}">Kembali ke Login</a></p>
    </div>
</body>

</html>