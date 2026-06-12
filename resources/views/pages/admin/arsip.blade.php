@extends('layouts.admin')

@section('title', 'Arsip Surat & Dokumen')

@section('content')
<div class="activity-log-container" style="margin-top: 0;">
    <div class="form-header" style="border-bottom: 1px solid var(--border-light); padding-bottom: 15px; margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 5px;">
                <h2>Arsip Surat & Dokumen Internal</h2>
                <span class="badge status-archive" style="font-size: 0.8rem; padding: 3px 8px;">Sekretaris Mode</span>
            </div>
            <p>Pusat pengarsipan digital berkas proposal, surat masuk, surat keluar, dan laporan pertanggungjawaban (LPJ).</p>
        </div>
        
        <button type="button" class="btn-submit" onclick="openUploadArsipModal()" style="display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 10px rgba(111, 66, 193, 0.2);">
            📁 Upload Berkas PDF
        </button>
    </div>

    <div class="table-responsive">
        <table class="admin-dashboard-table">
            <thead>
                <tr>
                    <th style="width: 140px;">Nomor Berkas / Surat</th>
                    <th>Nama Dokumen</th>
                    <th>Kategori</th>
                    <th>Tanggal Diarsipkan</th>
                    <th>File Berkas</th>
                    <th style="text-align: center; width: 100px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>012/PROP/ORG/2026</code></td>
                    <td class="user-actor" style="font-weight: 600;">Proposal Kegiatan Jurnalistik Tahunan</td>
                    <td>Proposal Kegiatan</td>
                    <td>Hari ini, 14:30</td>
                    <td>
                        <a href="#" style="color: var(--primary-purple); text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 5px;">
                            📄 LPJ_Kegiatan.pdf
                        </a>
                    </td>
                    <td style="text-align: center;">
                        <a href="#" class="btn-cancel" style="padding: 6px 12px; font-size: 0.85rem; text-decoration: none; background-color: #ffeef0; color: var(--danger-red); border-radius: 6px; font-weight: 600;">🗑️ Hapus</a>
                    </td>
                </tr>

                <tr>
                    <td><code>045/SM/Humas/VI/2026</code></td>
                    <td class="user-actor" style="font-weight: 600;">Surat Undangan Studi Banding Eksternal</td>
                    <td>Surat Masuk</td>
                    <td>05 Jun 2026</td>
                    <td>
                        <a href="#" style="color: var(--primary-purple); text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 5px;">
                            📄 Undangan_Studi_Banding.pdf
                        </a>
                    </td>
                    <td style="text-align: center;">
                        <a href="#" class="btn-cancel" style="padding: 6px 12px; font-size: 0.85rem; text-decoration: none; background-color: #ffeef0; color: var(--danger-red); border-radius: 6px; font-weight: 600;">🗑️ Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="modal-overlay" id="uploadArsipModal">
    <div class="modal-container" style="max-width: 550px;">
        <div class="modal-header">
            <h3>Upload Arsip Dokumen Baru</h3>
            <button type="button" class="btn-close-modal" onclick="closeUploadArsipModal()">&times;</button>
        </div>
        
        <form action="#" method="POST" enctype="multipart/form-data" class="admin-main-form">
            @csrf
            <div class="modal-body" style="padding: 20px 25px; gap: 16px;">
                
                <div class="form-group">
                    <label for="no_dokumen">Nomor Surat / Kode Berkas</label>
                    <input type="text" id="no_dokumen" name="no_dokumen" placeholder="Contoh: 012/PROP/ORG/2026" required>
                </div>

                <div class="form-group">
                    <label for="nama_dokumen">Nama / Judul Dokumen</label>
                    <input type="text" id="nama_dokumen" name="nama_dokumen" placeholder="Masukkan judul arsip dokumen..." required>
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori Berkas</label>
                    <select id="kategori" name="kategori" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Surat Masuk">Surat Masuk</option>
                        <option value="Surat Keluar">Surat Keluar</option>
                        <option value="Proposal Kegiatan">Proposal Kegiatan</option>
                        <option value="Laporan Pertanggungjawaban (LPJ)">Laporan Pertanggungjawaban (LPJ)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="file_pdf">Pilih File Berkas (Wajib PDF)</label>
                    <input type="file" id="file_pdf" name="file_pdf" accept="application/pdf" required>
                    <small class="form-help">Format yang diizinkan hanya berkas bertipe .pdf dengan ukuran maksimal 5MB.</small>
                </div>

            </div>
            
            <div class="modal-footer" style="background-color: #f8f9fa; border-top: 1px solid var(--border-light);">
                <button type="button" class="btn-cancel" style="padding: 10px 20px;" onclick="closeUploadArsipModal()">Batal</button>
                <button type="submit" class="btn-submit" style="padding: 10px 24px;">Unggah Arsip</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openUploadArsipModal() {
        document.getElementById('uploadArsipModal').classList.add('open');
    }

    function closeUploadArsipModal() {
        document.getElementById('uploadArsipModal').classList.remove('open');
    }

    window.onclick = function(event) {
        let modal = document.getElementById('uploadArsipModal');
        if (event.target == modal) {
            closeUploadArsipModal();
        }
    }
</script>
@endsection