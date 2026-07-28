<footer class="footer-utama">
    <div class="footer-container">
        <section class="footer-informasi">
            <h2>Sistem Informasi Publikasi Berita</h2>

            <p>
                Media informasi untuk menyampaikan berita, kegiatan,
                laporan, dan informasi organisasi kepada masyarakat.
            </p>
        </section>

        <nav class="footer-navigasi" aria-label="Navigasi footer">
            <h3>Navigasi Cepat</h3>

            <ul>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ url('/profil') }}">Profil</a></li>
                <li><a href="{{ url('/kegiatan') }}">Kegiatan</a></li>
                <li><a href="{{ url('/laporan') }}">Laporan</a></li>
                <li><a href="{{ url('/kontak') }}">Kontak</a></li>
            </ul>
        </nav>
    </div>

    <div class="footer-bawah">
        <p>
            &copy; {{ date('Y') }} Sistem Informasi Publikasi Berita.
            Dikembangkan menggunakan Laravel.
        </p>
    </div>
</footer>