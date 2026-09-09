@extends('layouts.admin')

@section('title', 'Edit Berita Kegiatan')

@section('content')
<div class="form-admin-container">
    <div class="form-header">
        <h2>Edit Berita & Kegiatan</h2>
        <p>Perbarui data berita atau kegiatan yang sudah tersimpan.</p>
    </div>

    <form action="/admin/berita/{{ $berita->id }}" method="POST" enctype="multipart/form-data" class="admin-main-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul">Judul Berita / Kegiatan</label>
            <input
                type="text"
                id="judul"
                name="title"
                value="{{ old('title', $berita->title) }}"
                required
            >
        </div>

        <div class="form-row-two">
            <div class="form-group">
                <label for="kategori">Kategori Tampilan</label>
                <select id="kategori" name="category" required>
                    <option value="">-- Pilih Kategori --</option>

                    <option value="latest" @selected(old('category', $berita->category) === 'latest')>
                        LATEST NEWS
                    </option>

                    <option value="gadgets" @selected(old('category', $berita->category) === 'gadgets')>
                        GADGETS
                    </option>

                    <option value="sports" @selected(old('category', $berita->category) === 'sports')>
                        SPORTS
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="divisi">Divisi Pelaksana (Untuk Rekap Laporan)</label>
                <select id="divisi" name="divisi" required>
                    <option value="">-- Pilih Divisi --</option>

                    <option
                        value="Divisi Hubungan Masyarakat (Humas)"
                        @selected(old('divisi', $berita->divisi) === 'Divisi Hubungan Masyarakat (Humas)')
                    >
                        Divisi Hubungan Masyarakat (Humas)
                    </option>

                    <option
                        value="Divisi Internal & Kaderisasi"
                        @selected(old('divisi', $berita->divisi) === 'Divisi Internal & Kaderisasi')
                    >
                        Divisi Internal & Kaderisasi
                    </option>

                    <option
                        value="Divisi Minat, Bakat & Olahraga"
                        @selected(old('divisi', $berita->divisi) === 'Divisi Minat, Bakat & Olahraga')
                    >
                        Divisi Minat, Bakat & Olahraga
                    </option>

                    <option
                        value="Divisi Dana & Usaha (Danus)"
                        @selected(old('divisi', $berita->divisi) === 'Divisi Dana & Usaha (Danus)')
                    >
                        Divisi Dana & Usaha (Danus)
                    </option>
                </select>
            </div>
        </div>

        <div class="form-row-two">
            <div class="form-group">
                <label for="lokasi">Lokasi / Tempat Pelaksanaan</label>
                <input
                    type="text"
                    id="lokasi"
                    name="lokasi"
                    value="{{ old('lokasi', $berita->lokasi) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal Kegiatan</label>
                <input
                    type="date"
                    id="tanggal"
                    name="tanggal_kegiatan"
                    value="{{ old('tanggal_kegiatan', $berita->tanggal_kegiatan->format('Y-m-d')) }}"
                    required
                >
            </div>
        </div>

        <div class="form-group-checkbox">
            <input
                type="checkbox"
                id="is_proker"
                name="is_proker"
                value="1"
                @checked(old('is_proker', $berita->is_proker))
            >

            <label for="is_proker">
                Dihitung sebagai capaian
                <strong>Program Kerja (Proker) Terlaksana</strong>
                di halaman laporan
            </label>
        </div>

        <div class="form-group">
            <label for="foto">Foto Utama / Dokumentasi Berita</label>

            <input
                type="file"
                id="foto"
                name="image"
                accept="image/*"
            >

            <small class="form-help">
                Biarkan kosong jika tidak ingin mengganti gambar.
                Format: JPG, JPEG, PNG. Maksimal 2MB.
            </small>
        </div>

        <div class="form-group">
            <label for="isi">Isi Artikel Konten Berita</label>

            <textarea
                id="isi"
                name="content"
                rows="10"
                required
            >{{ old('content', $berita->content) }}</textarea>
        </div>

        <div class="form-actions">
            <button
                type="button"
                class="btn-cancel"
                onclick="window.history.back()"
            >
                Batal
            </button>

            <button type="submit" class="btn-submit">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection