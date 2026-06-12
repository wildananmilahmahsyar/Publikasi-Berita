@extends('layouts.admin')

@section('title', 'Pesan Kontak Masuk')

@section('content')
<div class="activity-log-container" style="margin-top: 0;">
    <div class="form-header" style="border-bottom: 1px solid var(--border-light); padding-bottom: 15px; margin-bottom: 25px;">
        <h2>Daftar Pesan Kontak Publik</h2>
        <p>Kelola dan tinjau semua pesan, pertanyaan, atau saran yang masuk dari pengunjung website utama.</p>
    </div>

    <div class="table-responsive">
        <table class="admin-dashboard-table">
            <thead>
                <tr>
                    <th>Tanggal Masuk</th>
                    <th>Nama Pengirim</th>
                    <th>Email</th>
                    <th>Subjek / Perihal</th>
                    <th>Status</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Hari ini, 10:15</td>
                    <td class="user-actor">Andi Wijaya</td>
                    <td><code style="font-size: 0.9rem;">andi.wijaya@gmail.com</code></td>
                    <td><strong>Pertanyaan Kerja Sama Kegiatan</strong></td>
                    <td><span class="badge" style="background-color: #ffeef0; color: var(--danger-red);">Unread</span></td>
                    <td style="text-align: center;">
                        <button type="button" class="btn-submit" style="padding: 6px 12px; font-size: 0.85rem;" 
                                onclick="openMessageModal('Andi Wijaya', 'andi.wijaya@gmail.com', 'Pertanyaan Kerja Sama Kegiatan', 'Halo Admin,\n\nKami dari komunitas Jurnalis Muda Parepare berniat untuk mengajak kolaborasi dalam menyelenggarakan workshop penulisan berita pada akhir bulan ini.\n\nApakah ada nomor WhatsApp divisi Humas yang bisa kami hubungi untuk diskusi proposal lebih lanjut? Terima kasih!')">
                            Baca
                        </button>
                        <a href="#" class="btn-cancel" style="padding: 6px 12px; font-size: 0.85rem; text-decoration: none; background-color: #ffeef0; color: var(--danger-red);">Hapus</a>
                    </td>
                </tr>

                <tr>
                    <td>05 Jun 2026, 14:30</td>
                    <td class="user-actor">Siti Rahma</td>
                    <td><code style="font-size: 0.9rem;">siti.rahma@yahoo.com</code></td>
                    <td>Saran Mengenai Tampilan Website Publik</td>
                    <td><span class="badge status-success">Read</span></td>
                    <td style="text-align: center;">
                        <button type="button" class="btn-submit" style="padding: 6px 12px; font-size: 0.85rem; background-color: #6c757d;"
                                onclick="openMessageModal('Siti Rahma', 'siti.rahma@yahoo.com', 'Saran Mengenai Tampilan Website Publik', 'Saran saja min, bagian bagan struktur organisasi di halaman profil kalau bisa dikasih fitur zoom atau klik perbesar, soalnya tulisan nama pengurusnya agak kecil kalau dilihat lewat layar smartphone. Sukses terus!')">
                            Detail
                        </button>
                        <a href="#" class="btn-cancel" style="padding: 6px 12px; font-size: 0.85rem; text-decoration: none; background-color: #ffeef0; color: var(--danger-red);">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="modal-overlay" id="messageModal">
    <div class="modal-container">
        <div class="modal-header">
            <h3>Detail Isi Pesan Masuk</h3>
            <button type="button" class="btn-close-modal" onclick="closeMessageModal()">&times;</button>
        </div>
        <div class="modal-body">
            <div class="modal-info-row">
                <span class="info-label">Pengirim:</span>
                <span class="info-value" id="modalSender"></span>
            </div>
            <div class="modal-info-row">
                <span class="info-label">Email:</span>
                <span class="info-value" id="modalEmail"></span>
            </div>
            <div class="modal-info-row">
                <span class="info-label">Subjek:</span>
                <span class="info-value" style="font-weight: 600;" id="modalSubject"></span>
            </div>
            <div>
                <span class="info-label" style="font-weight: 600; font-size: 0.95rem; color: var(--text-muted);">Isi Pesan:</span>
                <div class="modal-message-content" id="modalText"></div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-cancel" style="padding: 8px 20px;" onclick="closeMessageModal()">Tutup</button>
        </div>
    </div>
</div>

<script>
    function openMessageModal(name, email, subject, text) {
        // Isi data ke elemen modal
        document.getElementById('modalSender').innerText = name;
        document.getElementById('modalEmail').innerText = email;
        document.getElementById('modalSubject').innerText = subject;
        document.getElementById('modalText').innerText = text;
        
        // Munculkan modal dengan menambah class 'open'
        document.getElementById('messageModal').classList.add('open');
    }

    function closeMessageModal() {
        // Sembunyikan modal dengan menghapus class 'open'
        document.getElementById('messageModal').classList.remove('open');
    }

    // Penutup otomatis jika user mengklik area abu-abu di luar kotak modal
    window.onclick = function(event) {
        let modal = document.getElementById('messageModal');
        if (event.target == modal) {
            closeMessageModal();
        }
    }
</script>
@endsection