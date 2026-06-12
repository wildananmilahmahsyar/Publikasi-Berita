@extends('layouts.app')

@section('title', 'Detail Berita Kegiatan - Publikasi')

@section('content')
<section class="detail-berita-section">
    <div class="detail-berita-container">
        
        <div class="news-breadcrumb">
            <a href="/">Home</a> / <a href="/kegiatan">Kegiatan</a> / <span class="current-page">Detail Berita</span>
        </div>

        <header class="entry-header">
            <span class="category-badge">Humas</span>
            <h1 class="entry-title">Pelatihan Jurnalistik Dasar Tingkatkan Skill Menulis Anggota</h1>
            
            <div class="entry-meta">
                <span class="meta-item"><i class="far fa-calendar-alt"></i> 28 Mei 2026</span>
                <span class="meta-item"><i class="far fa-user"></i> Oleh Redaksi</span>
                <span class="meta-item"><i class="far fa-eye"></i> 142 Dilihat</span>
            </div>
        </header>

        <div class="featured-image-wrapper">
            <img src="{{ url('/picture/sampel.jpg') }}" alt="Dokumentasi Pelatihan Jurnalistik">
            <span class="image-caption">Foto Bersama peserta dan pemateri setelah sesi materi jurnalistik dasar selesai.</span>
        </div>

        <article class="entry-content">
            <p class="lead-text"><strong>PAREPARE</strong> — Dalam rangka meningkatkan kapasitas dan kualitas penulisan informasi di lingkungan internal, organisasi sukses menggelar Pelatihan Jurnalistik Dasar bagi seluruh perwakilan divisi pada Sabtu kemarin.</p>
            
            <p>Kegiatan yang berlangsung di Ruang Pertemuan B.3 ini menghadirkan praktisi media profesional sebagai pemateri utama. Fokus utama dari pelatihan ini adalah pembekalan teknik reportase, tata cara penggalian data yang valid, hingga struktur penulisan berita menggunakan formula standard 5W+1H agar informasi kegiatan organisasi dapat tersampaikan dengan jelas ke publik.</p>
            
            <p>Ketua panitia pelaksana menegaskan bahwa di era digital saat ini, setiap anggota organisasi dituntut untuk mampu menjadi produsen informasi yang bijak dan informatif. "Melalui sistem publikasi baru ini, dokumentasi program kerja tidak hanya sekadar formalitas arsip, melainkan menjadi produk jurnalistik yang menarik untuk dibaca oleh masyarakat luas," ujarnya.</p>

            <blockquote>
                "Informasi yang dikemas dengan struktur jurnalistik yang baik akan memberikan dampak citra positif yang masif bagi eksistensi sebuah organisasi."
            </blockquote>

            <p>Sesi pelatihan kemudian diakhiri dengan simulasi langsung penulisan rilis berita oleh masing-masing perwakilan divisi. Hasil penulisan tersebut langsung dievaluasi bersama guna menyamakan standar redaksional website publikasi ke depannya. Seluruh dokumentasi hasil latihan juga akan diarsipkan secara bertahap dalam sistem laporan kegiatan.</p>
        </article>


    </div>
</section>
@endsection