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
                @forelse ($pesanKontaks as $pesanKontak)
                    <tr>
                        <td>
                            {{ $pesanKontak->created_at?->timezone('Asia/Makassar')->format('d M Y, H:i') ?? '-' }}
                        </td>

                        <td class="user-actor">
                            {{ $pesanKontak->nama }}
                        </td>

                        <td>
                            <code style="font-size: 0.9rem;">
                                {{ $pesanKontak->email }}
                            </code>
                        </td>

                        <td>
                            <strong>{{ $pesanKontak->subjek }}</strong>
                        </td>

                        <td>
                            <span class="badge" style="background-color: #eef2ff; color: #4f46e5;">
                                Masuk
                            </span>
                        </td>

                        <td style="text-align: center;">
                            <span style="font-size: 0.85rem; color: var(--text-muted);">
                                Detail belum tersedia
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6"
                            style="text-align: center; padding: 25px; color: var(--text-muted);">
                            Belum ada pesan kontak masuk.
                        </td>
                    </tr>
                @endforelse
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