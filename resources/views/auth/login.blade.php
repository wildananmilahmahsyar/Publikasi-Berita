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
    </div>
</section>

</body>
</html>