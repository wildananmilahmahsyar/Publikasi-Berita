@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<section class="admin-content">
    <h1>Dashboard Admin</h1>

    <p class="dashboard-subtitle">
        Selamat datang di panel kendali digitalisasi organisasi. Semua aktivitas manajemen 
        konten publik dan pengarsipan data internal dapat dipantau melalui halaman ini.
    </p>

    <div class="admin-card-wrapper">
        <div class="admin-card">
            <h3>Total Publikasi</h3>
            <p><strong>38</strong> Berita Kegiatan</p>
            <small>Diambil otomatis dari total post berita publik.</small>
        </div>

        <div class="admin-card">
            <h3>Capaian Proker</h3>
            <p><strong>85%</strong> Terlaksana</p>
            <small>Kalkulasi otomatis dari indikator check-proker berita.</small>
        </div>

        <div class="admin-card">
            <h3>Arsip Internal</h3>
            <p><strong>12</strong> Dokumen PDF</p>
            <small>Jumlah surat dan proposal yang diarsip Sekretaris.</small>
        </div>
    </div>

    <div class="dashboard-meta-container">
        <div class="meta-box role-info-box">
            <h3>🔑 Status Hak Akses Anda</h3>
            <div class="role-badge">ADMIN WEB (DIREKSI)</div>
            <p>Anda memiliki akses penuh untuk mengelola konten yang dikonsumsi oleh publik seperti Berita, Profil Organisasi, dan meninjau Pesan Masuk.</p>
            <span class="system-time">Sesi aktif: 2026-06-07</span>
        </div>

        <div class="meta-box notes-box">
            <div class="notes-box-header">
                <h3>📌 Catatan / Memo Internal</h3>
                <button type="button" class="notes-edit-btn">Edit</button>
            </div>

            <ul class="dashboard-notes-list">
                <li>Mohon Sekretaris segera melengkapi arsip PDF Surat Keluar bulan ini.</li>
                <li>Ganti bagan struktur organisasi jika masa kepengurusan baru telah disahkan.</li>
                <li>Periksa menu Pesan Kontak secara berkala untuk merespon pertanyaan publik.</li>
            </ul>
        </div>
    </div>

    <div class="activity-log-container">
        <h2>Aktivitas Sistem Terakhir</h2>
        
        <div class="table-responsive">
            <table class="admin-dashboard-table">
                <thead>
                    <tr>
                        <th>Waktu / Tanggal</th>
                        <th>Pelaku</th>
                        <th>Aktivitas Sistem</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($activities as $activity)
                        <tr>
                            <td>{{ $activity['activity_at']->format('d M Y, H:i') }}</td>
                            <td class="user-actor">{{ $activity['actor'] }}</td>
                            <td>{{ $activity['description'] }}</td>
                            <td>
                                <span class="badge {{ $activity['status_class'] }}">
                                    {{ $activity['status'] }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Belum ada aktivitas sistem.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection
