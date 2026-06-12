@extends('layouts.app')

@section('title', 'Dokumentasi Kegiatan Organisasi')

@section('content')
<section class="kegiatan-section">
    <div class="kegiatan-container">
        
        <div class="kegiatan-header">
            <h2>Dokumentasi & Agenda Kegiatan</h2>
            <p>Daftar rekapitulasi seluruh program kerja dan agenda resmi organisasi yang telah sukses dilaksanakan maupun yang akan datang.</p>
        </div>

        <div class="upcoming-events-section">
            <h3 class="sub-title">Agenda Mendatang</h3>
            <div class="upcoming-grid">
                <div class="upcoming-card">
                    <div class="event-date">15 <span>Jun</span></div>
                    <div class="event-details">
                        <h4>Rapat Koordinasi Triwulan</h4>
                        <p>Divisi Internal • 14.00 WITA • Ruang Sekretariat</p>
                    </div>
                </div>
                <div class="upcoming-card">
                    <div class="event-date">22 <span>Jun</span></div>
                    <div class="event-details">
                        <h4>Bakhtiar Jurnalistik Award 2026</h4>
                        <p>Divisi Humas • 09.00 WITA • Aula Kota</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="filter-kegiatan">
            <span class="filter-label">Saring Divisi:</span>
            <button class="filter-btn active">Semua</button>
            <button class="filter-btn">Humas</button>
            <button class="filter-btn">Kaderisasi</button>
            <button class="filter-btn">Minat & Bakat</button>
        </div>

        <h3 class="sub-title">Kegiatan yang Telah Terlaksana</h3>
        <div class="kegiatan-list-grid">
            
            <div class="kegiatan-item-card">
                <div class="kegiatan-img">
                    <img src="{{ url('/picture/sampel.jpg') }}" alt="Gambar Kegiatan">
                    <span class="divisi-tag">Kaderisasi</span>
                </div>
                <div class="kegiatan-info">
                    <span class="kegiatan-date">05 Juni 2026</span>
                    <h4><a href="#">Musyawarah Kerja Tahunan Periode 2026 Sukses Digelar</a></h4>
                    <p>Musyawarah kerja ini melahirkan 24 program kerja baru yang berfokus pada penguatan digitalisasi informasi organisasi...</p>
                    <a href="#" class="read-more-link">Lihat Dokumentasi →</a>
                </div>
            </div>

            <div class="kegiatan-item-card">
                <div class="kegiatan-img">
                    <img src="{{ url('/picture/sampel.jpg') }}" alt="Gambar Kegiatan">
                    <span class="divisi-tag">Humas</span>
                </div>
                <div class="kegiatan-info">
                    <span class="kegiatan-date">28 Mei 2026</span>
                    <h4><a href="#">Pelatihan Jurnalistik Dasar Tingkatkan Skill Menulis Anggota</a></h4>
                    <p>Menghadirkan pemateri profesional, kegiatan ini bertujuan untuk membekali anggota baru teknik reportase yang valid...</p>
                    <a href="#" class="read-more-link">Lihat Dokumentasi →</a>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection