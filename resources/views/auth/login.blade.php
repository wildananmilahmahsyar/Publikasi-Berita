<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<section class="login-page">
    <div class="login-card">
        <h1>Login Admin</h1>
        <p>Masuk ke panel pengelolaan sistem publikasi berita.</p>
        <div class="login-info">
            <div class="login-info-title">Akses Admin Publikasi Berita</div>
            <div class="login-info-text">
                Halaman ini khusus untuk admin dan pengelola sistem publikasi berita.
                Gunakan akun yang telah terdaftar untuk mengakses panel pengelolaan.
            </div>
        </div>

        @if ($errors->any())
            <div class="login-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="Masukkan email admin"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button type="submit" class="btn-login">Masuk</button>
        </form>
        <a href="{{ url('/') }}" class="btn-back-home">
            ← Kembali ke Halaman Pengunjung
        </a>
    </div>
</section>

</body>
</html>