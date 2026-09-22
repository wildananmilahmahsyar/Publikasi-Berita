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
                <button type="button" class="notes-edit-btn" id="edit-notes-btn">Edit</button>
            </div>

            <ul class="dashboard-notes-list" id="dashboard-notes-list">
                <li>Mohon Sekretaris segera melengkapi arsip PDF Surat Keluar bulan ini.</li>
                <li>Ganti bagan struktur organisasi jika masa kepengurusan baru telah disahkan.</li>
                <li>Periksa menu Pesan Kontak secara berkala untuk merespon pertanyaan publik.</li>
            </ul>
            <div id="notes-editor" style="display: none;">
                <textarea
                    id="notes-textarea"
                    rows="6"
                    placeholder="Satu catatan per baris"
                ></textarea>

                <div class="notes-editor-actions">
                    <button type="button" id="save-notes-btn">Simpan</button>
                    <button type="button" id="cancel-notes-btn">Batal</button>
                </div>
            </div>
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
                    <tr>
                        <td>Hari ini, 22:15</td>
                        <td class="user-actor">Admin Web (Direksi)</td>
                        <td>Mempublikasikan Berita: <em>"Sesi Berbagi Ilmu: Pengenalan Jurnalistik"</em></td>
                        <td><span class="badge status-success">Success</span></td>
                    </tr>
                    <tr>
                        <td>Kemarin, 14:30</td>
                        <td class="user-actor">Sekretaris</td>
                        <td>Mengunggah berkas: <code>LPJ_Kegiatan_Tahunan.pdf</code></td>
                        <td><span class="badge status-archive">Archived</span></td>
                    </tr>
                    <tr>
                        <td>05 Jun 2026, 09:12</td>
                        <td class="user-actor">Admin Web (Direksi)</td>
                        <td>Mengubah data Visi & Misi pada Halaman Profil</td>
                        <td><span class="badge status-update">Updated</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>


<script>
document.addEventListener('DOMContentLoaded', () => {
    const list = document.getElementById('dashboard-notes-list');
    const editor = document.getElementById('notes-editor');
    const textarea = document.getElementById('notes-textarea');
    const editBtn = document.getElementById('edit-notes-btn');
    const saveBtn = document.getElementById('save-notes-btn');
    const cancelBtn = document.getElementById('cancel-notes-btn');

    let currentNotes = [];

    const renderNotes = (notes) => {
        list.innerHTML = '';

        if (!notes.length) {
            const li = document.createElement('li');
            li.textContent = 'Belum ada catatan internal.';
            list.appendChild(li);
            return;
        }

        notes.forEach(note => {
            const li = document.createElement('li');
            li.textContent = note.content;
            list.appendChild(li);
        });
    };

    const loadNotes = async () => {
        try {
            const response = await fetch('{{ route('admin.catatan.show') }}', {
                headers: {
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error('Gagal memuat catatan.');
            }

            const data = await response.json();
            currentNotes = data.catatans ?? [];
            renderNotes(currentNotes);
        } catch (error) {
            list.innerHTML = '<li>Catatan gagal dimuat.</li>';
            console.error(error);
        }
    };

    editBtn.addEventListener('click', () => {
        textarea.value = currentNotes
            .map(note => note.content)
            .join('\n');

        list.style.display = 'none';
        editor.style.display = 'block';
        editBtn.style.display = 'none';
    });

    cancelBtn.addEventListener('click', () => {
        editor.style.display = 'none';
        list.style.display = '';
        editBtn.style.display = '';
    });

    saveBtn.addEventListener('click', async () => {
        const catatans = textarea.value
            .split('\n')
            .map(note => note.trim())
            .filter(note => note.length > 0);

        if (!catatans.length) {
            alert('Isi minimal satu catatan.');
            return;
        }

        saveBtn.disabled = true;

        try {
            const response = await fetch('{{ route('admin.catatan.update') }}', {
                method: 'PUT',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ catatans })
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.message ?? 'Gagal menyimpan catatan.');
            }

            currentNotes = data.catatans ?? [];
            renderNotes(currentNotes);

            editor.style.display = 'none';
            list.style.display = '';
            editBtn.style.display = '';
        } catch (error) {
            alert(error.message);
            console.error(error);
        } finally {
            saveBtn.disabled = false;
        }
    });

    loadNotes();
});
</script>

@endsection

