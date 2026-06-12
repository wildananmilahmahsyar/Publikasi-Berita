@extends('layouts.app')

@section('title', 'Profil Organisasi - Publikasi Berita')

@section('content')
<section class="profil-section">
    <div class="profil-container">
        
        <div class="profil-header">
            <h2>Profil Organisasi</h2>
            <p>Mengenal lebih dekat sejarah, visi, misi, dan struktur kepengurusan organisasi kami.</p>
        </div>

        <div class="profil-content-block">
            <div class="section-title-line">
                <h3>Sejarah & Latar Belakang</h3>
            </div>
            <div class="text-content">
                <p>Didirikan pada tahun 1998, organisasi ini berawal dari semangat sekumpulan pemuda yang ingin memberikan kontribusi nyata bagi masyarakat melalui penyebaran informasi yang akurat dan edukatif. Selama lebih dari dua dekade, kami telah bertransformasi dari komunitas lokal menjadi organisasi profesional yang berfokus pada pengembangan jurnalistik dan publikasi kegiatan positif.</p>
                <p>Kami percaya bahwa setiap kegiatan kecil memiliki dampak besar jika dikomunikasikan dengan baik. Melalui platform Sistem Informasi Publikasi Berita ini, kami berkomitmen untuk terus menjaga transparansi dan profesionalisme dalam setiap dokumentasi agenda organisasi.</p>
            </div>
        </div>

        <div class="profil-grid">
            <div class="vision-mission-box">
                <div class="section-title-line">
                    <h3>Visi Kami</h3>
                </div>
                <p>"Menjadi organisasi publikasi informasi terdepan yang independen, edukatif, dan mampu menginspirasi perubahan positif di masyarakat melalui karya jurnalistik yang berkualitas."</p>
            </div>

            <div class="vision-mission-box">
                <div class="section-title-line">
                    <h3>Misi Kami</h3>
                </div>
                <ul>
                    <li>Menyajikan berita kegiatan organisasi yang akurat, cepat, dan berimbang.</li>
                    <li>Mengembangkan kompetensi anggota dalam bidang jurnalistik dan teknologi informasi.</li>
                    <li>Membangun jejaring komunikasi yang efektif antar divisi dan pihak eksternal.</li>
                    <li>Memanfaatkan teknologi digital untuk optimalisasi penyebaran informasi organisasi.</li>
                </ul>
            </div>
        </div>

        <div class="profil-content-block">
            <div class="section-title-line">
                <h3>Struktur Organisasi</h3>
            </div>
            <div class="text-content">
                <p>Berikut adalah bagan struktur kepengurusan organisasi periode 2026-2027 yang menjalankan roda operasional dan koordinasi antar divisi.</p>
            </div>
            <div class="structure-image-container">
                <img src="{{ url('/picture/struktur.jpg') }}" alt="Bagan Struktur Organisasi">
            </div>
        </div>

        <div class="core-values-section">
            <div class="section-title-line">
                <h3>Nilai-Nilai Kami</h3>
            </div>
            <div class="values-grid">
                <div class="value-item">
                    <i class="fas fa-check-circle"></i>
                    <h4>Integritas</h4>
                    <p>Menjunjung tinggi kejujuran dan etika dalam setiap informasi yang dipublikasikan.</p>
                </div>
                <div class="value-item">
                    <i class="fas fa-users"></i>
                    <h4>Kolaborasi</h4>
                    <p>Bekerja sama secara harmonis antar divisi demi mencapai tujuan organisasi.</p>
                </div>
                <div class="value-item">
                    <i class="fas fa-lightbulb"></i>
                    <h4>Inovasi</h4>
                    <p>Selalu beradaptasi dengan perkembangan teknologi informasi terkini.</p>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection