<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Publikasi Berita')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('picture/logo web.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('component.headerutama')

    <main>
        @yield('content')
    </main>

    @include('component.footerutama')

</body>
</html>