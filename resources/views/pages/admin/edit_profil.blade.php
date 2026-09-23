@extends('layouts.admin')

@section('title', 'Kelola Profil Organisasi')

@section('content')
<div class="form-admin-container">

    <div class="form-header">
        <h2>Kelola Informasi Profil Publik</h2>
        <p>Sesuaikan seluruh konten halaman profil publik, termasuk sejarah, visi-misi, bagan struktur, dan nilai organisasi.</p>
        <p style="margin-top: 6px; font-size: 0.9rem; color: var(--text-muted);">
            Terakhir diperbarui:
            <strong>{{ $profil->updated_at?->timezone('Asia/Makassar')->format('d/m/Y H:i') ?? '-' }} WITA</strong>
        </p>
    </div>

    @if (session('success'))
        <div style="margin-bottom: 20px; padding: 12px; background: #d4edda; color: #155724; border-radius: 8px;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="margin-bottom: 20px; padding: 12px; background: #f8d7da; color: #721c24; border-radius: 8px;">
            <strong>Periksa kembali data yang dimasukkan.</strong>
            <ul style="margin-top: 8px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.profil.update') }}"
          method="POST"
          enctype="multipart/form-data"
          class="admin-main-form">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label style="color: var(--primary-purple); font-size: 1.1rem;">
                I. Sejarah & Latar Belakang
            </label>

            <textarea
                id="sejarah"
                name="sejarah"
                rows="8"
                placeholder="Tuliskan sejarah lengkap berdirinya organisasi di sini..."
                required>{{ old('sejarah', $profil->sejarah) }}</textarea>

            <small class="form-help">
                Narasi panjang mengenai latar belakang organisasi yang tampil di bagian atas halaman profil publik.
            </small>
        </div>

        <div class="form-group">
            <label style="color: var(--primary-purple); font-size: 1.1rem;">
                II. Visi & Misi
            </label>
        </div>

        <div class="form-row-two" style="margin-top: -15px;">

            <div class="form-group">
                <label for="visi">Visi Organisasi</label>

                <textarea
                    id="visi"
                    name="visi"
                    rows="6"
                    placeholder="Tuliskan visi utama organisasi..."
                    required>{{ old('visi', $profil->visi) }}</textarea>
            </div>

            <div class="form-group">
                <label for="misi">Misi Organisasi</label>

                <textarea
                    id="misi"
                    name="misi"
                    rows="6"
                    placeholder="Tuliskan satu poin misi per baris..."
                    required>{{ old('misi', $profil->misi) }}</textarea>
            </div>

        </div>

        <div class="form-group" style="margin-top: 10px;">

            <label style="color: var(--primary-purple); font-size: 1.1rem;">
                III. Bagan Struktur Kepengurusan
            </label>

            <label for="bagan_struktur" style="margin-top: 5px;">
                Upload Foto Bagan Baru (Periode 2026-2027)
            </label>

            <input
                type="file"
                id="bagan_struktur"
                name="structure_image"
                accept=".jpg,.jpeg,.png,image/jpeg,image/png">

            <small class="form-help">
                Format JPG, JPEG, atau PNG. Maksimal 3 MB. Kosongkan jika tidak ingin mengganti gambar.
            </small>

            @if ($profil->structure_image)
                <div style="margin-top: 12px;">
                    <p><strong>Bagan saat ini:</strong></p>
                    <img
                        src="{{ asset('storage/' . $profil->structure_image) }}"
                        alt="Bagan Struktur Saat Ini"
                        style="max-width: 350px; height: auto; border-radius: 8px;">
                </div>
            @endif

        </div>

        <div class="form-group" style="margin-top: 10px;">
            <label style="color: var(--primary-purple); font-size: 1.1rem;">
                IV. Nilai-Nilai Organisasi
            </label>
        </div>

        <div class="form-row-two"
             style="margin-top: -15px; grid-template-columns: repeat(3, 1fr);">

            <div class="form-group"
                 style="background: #f8f9fa; padding: 12px; border-radius: 8px; border: 1px solid var(--border-light);">

                <label for="nilai_1_title">Nilai 1 (Judul)</label>

                <input
                    type="text"
                    id="nilai_1_title"
                    name="nilai_1_title"
                    value="{{ old('nilai_1_title', $profil->nilai_1_title) }}"
                    required>

                <label for="nilai_1_desc"
                       style="margin-top: 5px; font-size: 0.85rem;">
                    Deskripsi
                </label>

                <textarea
                    id="nilai_1_desc"
                    name="nilai_1_desc"
                    rows="3"
                    style="font-size: 0.85rem; padding: 8px;"
                    required>{{ old('nilai_1_desc', $profil->nilai_1_desc) }}</textarea>
            </div>

            <div class="form-group"
                 style="background: #f8f9fa; padding: 12px; border-radius: 8px; border: 1px solid var(--border-light);">

                <label for="nilai_2_title">Nilai 2 (Judul)</label>

                <input
                    type="text"
                    id="nilai_2_title"
                    name="nilai_2_title"
                    value="{{ old('nilai_2_title', $profil->nilai_2_title) }}"
                    required>

                <label for="nilai_2_desc"
                       style="margin-top: 5px; font-size: 0.85rem;">
                    Deskripsi
                </label>

                <textarea
                    id="nilai_2_desc"
                    name="nilai_2_desc"
                    rows="3"
                    style="font-size: 0.85rem; padding: 8px;"
                    required>{{ old('nilai_2_desc', $profil->nilai_2_desc) }}</textarea>
            </div>

            <div class="form-group"
                 style="background: #f8f9fa; padding: 12px; border-radius: 8px; border: 1px solid var(--border-light);">

                <label for="nilai_3_title">Nilai 3 (Judul)</label>

                <input
                    type="text"
                    id="nilai_3_title"
                    name="nilai_3_title"
                    value="{{ old('nilai_3_title', $profil->nilai_3_title) }}"
                    required>

                <label for="nilai_3_desc"
                       style="margin-top: 5px; font-size: 0.85rem;">
                    Deskripsi
                </label>

                <textarea
                    id="nilai_3_desc"
                    name="nilai_3_desc"
                    rows="3"
                    style="font-size: 0.85rem; padding: 8px;"
                    required>{{ old('nilai_3_desc', $profil->nilai_3_desc) }}</textarea>
            </div>

        </div>

        <div class="form-actions">
            <button
                type="button"
                class="btn-cancel"
                onclick="window.history.back()">
                Batal
            </button>

            <button type="submit" class="btn-submit">
                Simpan Perubahan Profil
            </button>
        </div>

    </form>
</div>
@endsection