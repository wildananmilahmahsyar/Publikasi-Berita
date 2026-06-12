<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="admin-layout">

        <aside class="admin-sidebar">
            <h2>Admin Panel</h2>

            <nav>
                <a href="/admin">Dashboard</a>

                @if(auth()->user()->role === 'admin_web')
                    <a href="/admin/berita/create">Kelola Berita</a>
                    <a href="/admin/profil">Kelola Profil</a>
                    <a href="/admin/pesan">Pesan Kontak</a>
                @endif

                @if(auth()->user()->role === 'sekretaris')
                    <a href="/admin/pengurus">Data Master Pengurus</a>
                    <a href="/admin/arsip">Arsip Surat & Dokumen</a>
                @endif
            </nav>

            <div class="admin-user-box">
                <p>{{ auth()->user()->name }}</p>
                <small>{{ auth()->user()->role }}</small>

                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </aside>

        <main class="admin-main">
            @yield('content')
        </main>

    </div>

</body>
</html>