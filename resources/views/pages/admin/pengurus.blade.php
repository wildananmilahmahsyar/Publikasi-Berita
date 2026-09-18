@extends('layouts.admin')

@section('title', 'Data Master Pengurus')

@section('content')
<div class="activity-log-container" style="margin-top: 0;">
    <div class="form-header" style="border-bottom: 1px solid var(--border-light); padding-bottom: 15px; margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 5px;">
                <h2>Data Master Pengurus</h2>
                <span class="badge status-archive" style="font-size: 0.8rem; padding: 3px 8px;">Sekretaris Mode</span>
            </div>
            <p>Kelola data fungsionaris, rekapitulasi jabatan, dan pas foto aktif kepengurusan organisasi.</p>
        </div>
        
        <button type="button" class="btn-submit" onclick="openAddPengurusModal()" style="display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 10px rgba(111, 66, 193, 0.2);">
            ➕ Tambah Pengurus Baru
        </button>
    </div>

    <div style="margin-bottom: 20px; display: flex; gap: 12px; flex-wrap: wrap; align-items: center;">
        <input
            type="text"
            id="pengurusSearch"
            placeholder="Cari NIM, nama, jabatan, atau divisi..."
            style="width: 100%; max-width: 420px; padding: 10px 14px; border: 1px solid var(--border-light); border-radius: 8px; font-size: 0.9rem; outline: none;"
        >

        <select
            id="pengurusSort"
            style="padding: 10px 14px; border: 1px solid var(--border-light); border-radius: 8px; font-size: 0.9rem; background-color: white;"
        >
            <option value="">Urutkan berdasarkan...</option>
            <option value="nama-asc">Nama A-Z</option>
            <option value="nama-desc">Nama Z-A</option>
            <option value="jabatan-asc">Jabatan A-Z</option>
            <option value="jabatan-desc">Jabatan Z-A</option>
        </select>
    </div>

    <div class="table-responsive">
        <table class="admin-dashboard-table">
            <thead>
                <tr>
                    <th style="width: 120px;">NIM / ID</th>
                    <th style="text-align: center; width: 80px;">Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th>Divisi</th>
                    <th style="text-align: center; width: 100px;">Aksi</th>
                </tr>
            </thead>
            <tbody id="pengurusTableBody">
                <tr>
                    <td><code>18302-2026</code></td>
                    <td style="text-align: center;">
                        <div style="display: flex; flex-direction: column; align-items: center; gap: 4px;">
                            <img src="{{ url('/picture/uhuy.jpg') }}" alt="Foto Andi" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 2px solid var(--primary-purple); background-color: #eee;">                            
                        </div>
                    </td>
                    <td class="user-actor" style="font-weight: 600;">Andi Saputra</td>
                    <td>Ketua Umum</td>
                    <td>Direksi / Inti</td>
                    <td style="text-align: center;">
                        <a href="#" class="btn-cancel" style="padding: 6px 12px; font-size: 0.85rem; text-decoration: none; background-color: #ffeef0; color: var(--danger-red); border-radius: 6px; font-weight: 600;">🗑️ Hapus</a>
                    </td>
                </tr>

                <tr>
                    <td><code>18303-2027</code></td>
                    <td style="text-align: center;">
                        <div style="display: flex; flex-direction: column; align-items: center; gap: 4px;">
                            <img src="{{ url('/picture/uhuy.jpg') }}" alt="Foto Budi" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 2px solid var(--primary-purple); background-color: #eee;">
                        </div>
                    </td>
                    <td class="user-actor" style="font-weight: 600;">Budi Santoso</td>
                    <td>Humas Koordinator</td>
                    <td>Divisi Hubungan Masyarakat (Humas)</td>
                    <td style="text-align: center;">
                        <a href="#" class="btn-cancel" style="padding: 6px 12px; font-size: 0.85rem; text-decoration: none; background-color: #ffeef0; color: var(--danger-red); border-radius: 6px; font-weight: 600;">🗑️ Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="modal-overlay" id="addPengurusModal">
    <div class="modal-container" style="max-width: 600px;">
        <div class="modal-header">
            <h3>Input Data Pengurus Baru</h3>
            <button type="button" class="btn-close-modal" onclick="closeAddPengurusModal()">&times;</button>
        </div>
        
        <form action="#" method="POST" enctype="multipart/form-data" class="admin-main-form">
            @csrf
            <div class="modal-body" style="padding: 20px 25px; gap: 16px;">
                
                <div class="form-group">
                    <label for="nama">Nama Lengkap Pengurus</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap..." required>
                </div>

                <div class="form-row-two">
                    <div class="form-group">
                        <label for="nim">NIM / ID Anggota</label>
                        <input type="text" id="nim" name="nim" placeholder="Contoh: 18302-2026" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="jabatan">Jabatan Struktural</label>
                        <input type="text" id="jabatan" name="jabatan" placeholder="Contoh: Koordinator / Anggota" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="divisi">Divisi Organisasi</label>
                    <select id="divisi" name="divisi" required>
                        <option value="">-- Pilih Divisi --</option>
                        <option value="Direksi / Inti">Direksi / Inti</option>
                        <option value="Divisi Hubungan Masyarakat (Humas)">Divisi Hubungan Masyarakat (Humas)</option>
                        <option value="Divisi Internal & Kaderisasi">Divisi Internal & Kaderisasi</option>
                        <option value="Divisi Minat, Bakat & Olahraga">Divisi Minat, Bakat & Olahraga</option>
                        <option value="Divisi Dana & Usaha (Danus)">Divisi Dana & Usaha (Danus)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="foto_pengurus">Pas Foto Pengurus</label>
                    <input type="file" id="foto_pengurus" name="foto_pengurus" accept="image/*" required>
                    <small class="form-help">Format resmi: JPG, JPEG, PNG. Maksimal 2MB (Rasio 1:1 direkomendasikan).</small>
                </div>

            </div>
            
            <div class="modal-footer" style="background-color: #f8f9fa; border-top: 1px solid var(--border-light);">
                <button type="button" class="btn-cancel" style="padding: 10px 20px;" onclick="closeAddPengurusModal()">Batal</button>
                <button type="submit" class="btn-submit" style="padding: 10px 24px;">Simpan Anggota</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddPengurusModal() {
        document.getElementById('addPengurusModal').classList.add('open');
    }

    function closeAddPengurusModal() {
        document.getElementById('addPengurusModal').classList.remove('open');
    }
    const pengurusSearch = document.getElementById('pengurusSearch');
    const pengurusTableBody = document.getElementById('pengurusTableBody');
    const pengurusSort = document.getElementById('pengurusSort');

    pengurusSearch.addEventListener('input', function () {
        const keyword = this.value.toLowerCase().trim();
        const rows = pengurusTableBody.querySelectorAll('tr');

        rows.forEach(function (row) {
            const cells = row.querySelectorAll('td');

            const searchableText = [
                cells[0]?.textContent,
                cells[2]?.textContent,
                cells[3]?.textContent,
                cells[4]?.textContent
            ].join(' ').toLowerCase();

            row.style.display = searchableText.includes(keyword) ? '' : 'none';
        });
    });

    pengurusSort.addEventListener('change', function () {
        const sortValue = this.value;

        if (!sortValue) {
            return;
        }

        const rows = Array.from(pengurusTableBody.querySelectorAll('tr'));

        const [field, direction] = sortValue.split('-');

        const columnIndex = field === 'nama' ? 2 : 3;

        rows.sort(function (a, b) {
            const aText = a.children[columnIndex].textContent.trim();
            const bText = b.children[columnIndex].textContent.trim();

            const comparison = aText.localeCompare(bText, 'id', {
                sensitivity: 'base'
            });

            return direction === 'asc' ? comparison : -comparison;
        });

        rows.forEach(function (row) {
            pengurusTableBody.appendChild(row);
        });
    });

    window.onclick = function(event) {
        let modal = document.getElementById('addPengurusModal');
        if (event.target == modal) {
            closeAddPengurusModal();
        }
    }
</script>
@endsection