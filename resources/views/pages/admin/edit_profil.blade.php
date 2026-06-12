@extends('layouts.admin')

@section('title', 'Kelola Profil Organisasi')

@section('content')
<div class="form-admin-container">
    <div class="form-header">
        <h2>Kelola Informasi Profil Publik</h2>
        <p>Sesuaikan seluruh konten halaman profil publik, termasuk sejarah, visi-misi, bagan struktur, dan nilai organisasi.</p>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data" class="admin-main-form">
        @csrf
        
        <div class="form-group">
            <label style="color: var(--primary-purple); font-size: 1.1rem;">I. Sejarah & Latar Belakang</label>
            <textarea id="sejarah" name="sejarah" rows="8" placeholder="Tuliskan sejarah lengkap berdirinya organisasi di sini..." required>Didirikan pada tahun 1998, organisasi ini berawal dari semangat sekumpulan pemuda yang ingin memberikan kontribusi nyata bagi masyarakat melalui penyebaran informasi yang akurat dan edukatif. Selama lebih dari dua dekade, kami telah bertransformasi dari komunitas lokal menjadi organisasi profesional yang berfokus pada pengembangan jurnalistik dan publikasi kegiatan positif.</textarea>
            <small class="form-help">Narasi panjang mengenai latar belakang organisasi yang tampil di bagian atas halaman profil publik.</small>
        </div>

        <div class="form-group">
            <label style="color: var(--primary-purple); font-size: 1.1rem;">II. Visi & Misi</label>
        </div>
        
        <div class="form-row-two" style="margin-top: -15px;">
            <div class="form-group">
                <label for="visi">Visi Organisasi</label>
                <textarea id="visi" name="visi" rows="6" placeholder="Tuliskan visi utama organisasi..." required>"Menjadi organisasi publikasi informasi terdepan yang independen, edukatif, dan mampu menginspirasi perubahan positif di masyarakat melalui karya jurnalistik yang berkualitas."</textarea>
            </div>
            
            <div class="form-group">
                <label for="misi">Misi Organisasi</label>
                <textarea id="misi" name="misi" rows="6" placeholder="Tuliskan poin-poin misi organisasi..." required>• Menyajikan berita kegiatan organisasi yang akurat, cepat, dan berimbang.
• Mengembangkan kompetensi anggota dalam bidang jurnalistik dan teknologi informasi.
• Membangun jejaring komunikasi yang efektif antar divisi dan pihak eksternal.
• Memanfaatkan teknologi digital untuk optimalisasi penyebaran informasi organisasi.</textarea>
            </div>
        </div>

        <div class="form-group" style="margin-top: 10px;">
            <label style="color: var(--primary-purple); font-size: 1.1rem;">III. Bagan Struktur Kepengurusan</label>
            <label for="bagan_struktur" style="margin-top: 5px;">Upload Foto Bagan Baru (Periode 2026-2027)</label>
            <input type="file" id="bagan_struktur" name="structure_image" accept="image/*">
            <small class="form-help">Format: JPG, JPEG, PNG. Gambar ini akan menggantikan bagan pohon kepengurusan lama di halaman publik.</small>
        </div>

        <div class="form-group" style="margin-top: 10px;">
            <label style="color: var(--primary-purple); font-size: 1.1rem;">IV. Nilai-Nilai Organisasi (Bagian Bawah Halaman)</label>
        </div>

        <div class="form-row-two" style="margin-top: -15px; grid-template-columns: repeat(3, 1fr);">
            <div class="form-group" style="background: #f8f9fa; padding: 12px; border-radius: 8px; border: 1px solid var(--border-light);">
                <label for="nilai_1_title">Nilai 1 (Judul)</label>
                <input type="text" id="nilai_1_title" name="nilai_1_title" value="Integritas" required>
                <label for="nilai_1_desc" style="margin-top: 5px; font-size: 0.85rem;">Deskripsi</label>
                <textarea id="nilai_1_desc" name="nilai_1_desc" rows="3" style="font-size: 0.85rem; padding: 8px;" required>Menjunjung tinggi kejujuran dan etika dalam setiap informasi yang dipublikasikan.</textarea>
            </div>

            <div class="form-group" style="background: #f8f9fa; padding: 12px; border-radius: 8px; border: 1px solid var(--border-light);">
                <label for="nilai_2_title">Nilai 2 (Judul)</label>
                <input type="text" id="nilai_2_title" name="nilai_2_title" value="Kolaborasi" required>
                <label for="nilai_2_desc" style="margin-top: 5px; font-size: 0.85rem;">Deskripsi</label>
                <textarea id="nilai_2_desc" name="nilai_2_desc" rows="3" style="font-size: 0.85rem; padding: 8px;" required>Bekerja sama secara harmonis antar divisi demi mencapai tujuan organisasi.</textarea>
            </div>

            <div class="form-group" style="background: #f8f9fa; padding: 12px; border-radius: 8px; border: 1px solid var(--border-light);">
                <label for="nilai_3_title">Nilai 3 (Judul)</label>
                <input type="text" id="nilai_3_title" name="nilai_3_title" value="Inovasi" required>
                <label for="nilai_3_desc" style="margin-top: 5px; font-size: 0.85rem;">Deskripsi</label>
                <textarea id="nilai_3_desc" name="nilai_3_desc" rows="3" style="font-size: 0.85rem; padding: 8px;" required>Selalu beradaptasi dengan perkembangan teknologi informasi terkini.</textarea>
            </div>
        </div>

        <div class="form-actions">
            <button type="button" class="btn-cancel" onclick="window.history.back()">Batal</button>
            <button type="submit" class="btn-submit">Simpan Perubahan Profil</button>
        </div>
    </form>
</div>
@endsection