@extends('layouts.admin')

@section('title', 'Tambah Berita Kegiatan')

@section('content')
<div class="form-admin-container">
    <div class="form-header">
        <h2>Tambah Berita & Kegiatan Baru</h2>
        <p>Input data berita sekaligus perbarui statistik halaman laporan secara otomatis.</p>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data" class="admin-main-form">
        @csrf
        
        <div class="form-group">
            <label for="judul">Judul Berita / Kegiatan</label>
            <input type="text" id="judul" name="title" placeholder="Masukkan judul berita yang menarik..." required>
        </div>

        <div class="form-row-two">
            <div class="form-group">
                <label for="kategori">Kategori Tampilan</label>
                <select id="kategori" name="category" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="latest">LATEST NEWS</option>
                    <option value="gadgets">GADGETS</option>
                    <option value="sports">SPORTS</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="divisi">Divisi Pelaksana (Untuk Rekap Laporan)</label>
                <select id="divisi" name="divisi" required>
                    <option value="">-- Pilih Divisi --</option>
                    <option value="Divisi Hubungan Masyarakat (Humas)">Divisi Hubungan Masyarakat (Humas)</option>
                    <option value="Divisi Internal & Kaderisasi">Divisi Internal & Kaderisasi</option>
                    <option value="Divisi Minat, Bakat & Olahraga">Divisi Minat, Bakat & Olahraga</option>
                    <option value="Divisi Dana & Usaha (Danus)">Divisi Dana & Usaha (Danus)</option>
                </select>
            </div>
        </div>

        <div class="form-row-two">
            <div class="form-group">
                <label for="lokasi">Lokasi / Tempat Pelaksanaan</label>
                <input type="text" id="lokasi" name="lokasi" placeholder="Contoh: Aula Kampus Utama, Ruang B.3" required>
            </div>
            
            <div class="form-group">
                <label for="tanggal">Tanggal Kegiatan</label>
                <input type="date" id="tanggal" name="tanggal_kegiatan" required>
            </div>
        </div>

        <div class="form-group-checkbox">
            <input type="checkbox" id="is_proker" name="is_proker" value="1">
            <label for="is_proker">Dihitung sebagai capaian <strong>Program Kerja (Proker) Terlaksana</strong> di halaman laporan</label>
        </div>

        <div class="form-group">
            <label for="foto">Foto Utama / Dokumentasi Berita</label>
            <input type="file" id="foto" name="image" accept="image/*" required>
            <small class="form-help">Format: JPG, JPEG, PNG. Maksimal 2MB.</small>
        </div>

        <div class="form-group">
            <label for="isi">Isi Artikel Konten Berita</label>
            <textarea id="isi" name="content" rows="10" placeholder="Tulis naskah berita lengkap di sini..." required></textarea>
        </div>

        <div class="form-actions">
            <button type="button" class="btn-cancel" onclick="window.history.back()">Batal</button>
            <button type="submit" class="btn-submit">Publish Berita & Update Laporan</button>
        </div>
    </form>
</div>
@endsection