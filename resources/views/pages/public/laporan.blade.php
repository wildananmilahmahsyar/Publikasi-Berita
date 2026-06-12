@extends('layouts.app')

@section('title', 'Laporan Kegiatan Organisasi')

@section('content')
<section class="laporan-section">
    <div class="laporan-container">
        
        <div class="laporan-header">
            <h2>Laporan & Rekapitulasi Kegiatan Organisasi</h2>
            <p>Halaman ini menyajikan data akumulasi program kerja, statistik kontribusi divisi, serta log aktivitas agenda yang telah terlaksana.</p>
        </div>

        <div class="report-cards-grid">
            <div class="report-card">
                <h3>Total Kegiatan Terlaksana</h3>
                <p class="card-number">38</p>
                <span class="card-desc">Agenda resmi yang sukses dipublikasikan</span>
            </div>
            <div class="report-card">
                <h3>Ketercapaian Proker</h3>
                <p class="card-number">85%</p>
                <span class="card-desc">Dari seluruh target rencana tahunan</span>
            </div>
            <div class="report-card status-success">
                <h3>Divisi Teraktif</h3>
                <p class="card-status">HUMAS</p>
                <span class="card-desc">Kontributor laporan publikasi terbanyak</span>
            </div>
        </div>

        <div class="report-table-section">
            <h3 class="table-title">I. Rekapitulasi Program Kerja & Publikasi Berita per Divisi</h3>
            <table class="report-table">
                <thead>
                    <tr>
                        <th>Nama Bidang / Divisi</th>
                        <th>Target Proker</th>
                        <th>Proker Terlaksana</th>
                        <th>Jumlah Laporan Publikasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Divisi Hubungan Masyarakat (Humas)</strong></td>
                        <td>10</td>
                        <td>9</td>
                        <td>15 Berita</td>
                    </tr>
                    <tr>
                        <td><strong>Divisi Internal & Kaderisasi</strong></td>
                        <td>8</td>
                        <td>7</td>
                        <td>12 Berita</td>
                    </tr>
                    <tr>
                        <td><strong>Divisi Minat, Bakat & Olahraga</strong></td>
                        <td>6</td>
                        <td>5</td>
                        <td>8 Berita</td>
                    </tr>
                    <tr>
                        <td><strong>Divisi Dana & Usaha (Danus)</strong></td>
                        <td>4</td>
                        <td>2</td>
                        <td>3 Berita</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="report-table-section">
            <h3 class="table-title">II. Log Riwayat Pelaksanaan Agenda Organisasi Terbaru</h3>
            <table class="report-table log-table">
                <thead>
                    <tr>
                        <th>Tanggal Kegiatan</th>
                        <th>Nama Kegiatan / Agenda</th>
                        <th>Divisi Pelaksana</th>
                        <th>Lokasi / Tempat</th>
                        <th>Dokumentasi Publik</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>05-06-2026</td>
                        <td>Musyawarah Kerja Tahunan Periode 2026</td>
                        <td>Internal & Kaderisasi</td>
                        <td>Aula Kampus Utama</td>
                        <td><span class="branch-tag">Tersedia</span></td>
                    </tr>
                    <tr>
                        <td>28-05-2026</td>
                        <td>Sesi Berbagi Ilmu: Pengenalan Jurnalistik Dasar</td>
                        <td>Hubungan Masyarakat</td>
                        <td>Ruang Pertemuan B.3</td>
                        <td><span class="branch-tag">Tersedia</span></td>
                    </tr>
                    <tr>
                        <td>14-05-2026</td>
                        <td>Turnamen Futsal Antar Angkatan Internal</td>
                        <td>Minat, Bakat & Olahraga</td>
                        <td>Lapangan GOR Utama</td>
                        <td><span class="branch-tag">Tersedia</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</section>
@endsection