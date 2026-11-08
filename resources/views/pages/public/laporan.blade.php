@extends('layouts.app')

@section('title', 'Laporan Kegiatan Organisasi')

@section('content')
<style>
    /* SEQ-1: Warna header tabel laporan */
    .laporan-section .report-table thead th {
        background-color: #1D4ED8;
        color: #FFFFFF;
    }
</style>
<section class="laporan-section">
    <div class="laporan-container">
        
        <div class="laporan-header">
            <h2>Laporan & Rekapitulasi Kegiatan Organisasi</h2>
            <p>Halaman ini menyajikan data akumulasi program kerja, statistik kontribusi divisi, serta log aktivitas agenda yang telah terlaksana.</p>
        </div>

        <div class="report-cards-grid">
            <div class="report-card">
                <h3>Total Kegiatan Terlaksana</h3>
                <p class="card-number">{{ \App\Models\Berita::where('category', 'Kegiatan')->count() }}</p>
                <span class="card-desc">Agenda resmi yang sukses dipublikasikan</span>
            </div>
            <div class="report-card">
                <h3>Ketercapaian Proker</h3>
                @php
                    $jumlahRencanaProker = \App\Models\ProgramKerja::count();
                    $jumlahBeritaProker = \App\Models\Berita::where('is_proker', true)->count();

                    $rasioProker = $jumlahRencanaProker > 0
                        ? ($jumlahBeritaProker / $jumlahRencanaProker) * 100
                        : null;
                @endphp
                <p class="card-number">{{ $rasioProker === null ? '-' : number_format($rasioProker, 1, ',', '.') . '%' }}</p>
                <span class="card-desc">Rasio berita bertanda proker terhadap jumlah rencana proker</span>
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
                    @foreach ($rekapDivisi as $baris)
                        <tr>
                            <td><strong>{{ $baris['divisi'] }}</strong></td>
                            <td>{{ $baris['target'] }}</td>
                            <td>{{ $baris['terlaksana'] }}</td>
                            <td>{{ $baris['publikasi'] }} Berita</td>
                        </tr>
                    @endforeach
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
                    @forelse ($prokerTerbaru as $berita)
                        <tr>
                            <td>{{ $berita->tanggal_kegiatan?->format('d-m-Y') ?? '-' }}</td>
                            <td>{{ $berita->title }}</td>
                            <td>{{ $berita->divisi ?: '-' }}</td>
                            <td>{{ $berita->lokasi ?: '-' }}</td>
                            <td>
                                <a href="{{ url('/isiberita/' . $berita->id) }}"
                                   class="branch-tag">
                                    Lihat Berita
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align:center; padding:20px;">
                                Belum ada berita yang ditandai sebagai program kerja.
                            </td>
                        </tr>
                    @endforelse
</tbody>
            </table>
        </div>

    </div>
</section>
@endsection