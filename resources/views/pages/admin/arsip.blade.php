@extends('layouts.admin')

@section('title', 'Arsip Surat & Dokumen')

@section('content')
@if (session('success'))
    <div
        style="
            margin-bottom: 20px;
            padding: 12px 15px;
            background-color: #ecfdf5;
            border: 1px solid #a7f3d0;
            border-radius: 8px;
            color: #065f46;
            font-weight: 600;
        "
    >
        {{ session('success') }}
    </div>
@endif
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
        <div class="archive-summary-card">
        <div class="archive-summary-icon">
            &#128194;
        </div>

        <div class="archive-summary-content">
            <span class="archive-summary-label">Total Arsip Tersimpan</span>
            <strong class="archive-summary-value">
                {{ count($arsips) }} dokumen
            </strong>
        </div>
    </div>
    <div class="archive-search">
        <div class="archive-filter-grid">

            <div class="archive-filter-group">
                <label for="archiveSearch">Cari Arsip</label>

                <div class="archive-search-control">
                    <input
                        type="search"
                        id="archiveSearch"
                        placeholder="Cari nomor, nama, kategori, tanggal, atau nama file..."
                        autocomplete="off"
                    >

                    <button type="button" id="clearArchiveSearch">
                        Reset
                    </button>
                </div>
            </div>

            <div class="archive-filter-group">
                <label for="archiveCategoryFilter">Filter Kategori</label>

                <select id="archiveCategoryFilter">
                    <option value="all">Semua Kategori</option>
                    <option value="Proposal Kegiatan">Proposal Kegiatan</option>
                    <option value="Surat Masuk">Surat Masuk</option>
                    <option value="Surat Keluar">Surat Keluar</option>
                    <option value="Laporan Pertanggungjawaban (LPJ)">
                        Laporan Pertanggungjawaban (LPJ)
                    </option>
                </select>
            </div>

        </div>

        <p class="archive-search-info" id="archiveSearchInfo">
            Menampilkan seluruh data arsip.
        </p>
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

            <tbody id="archiveTableBody">
                <tbody id="archiveTableBody">
                    @forelse ($arsips as $arsip)
                        <tr class="archive-row" data-category="{{ $arsip->kategori }}">
                            <td>
                                <code>{{ $arsip->no_dokumen }}</code>
                            </td>

                            <td class="user-actor" style="font-weight: 600;">
                                {{ $arsip->nama_dokumen }}
                            </td>

                            <td>
                                {{ $arsip->kategori }}
                            </td>

                            <td>
                                {{ $arsip->created_at->format('d M Y') }}
                            </td>

                            <td>
                                <a
                                    href="{{ asset('storage/' . $arsip->file_pdf) }}"
                                    target="_blank"
                                    class="archive-pdf-button"
                                >
                                    &#128196; Lihat PDF
                                </a>
                            </td>

                            <td style="text-align: center;">
                                <span style="color: #6c757d; font-size: 0.85rem;">
                                    —
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr class="archive-empty">
                            <td colspan="6" style="text-align: center; padding: 25px;">
                                Belum ada arsip yang disimpan.
                            </td>
                        </tr>
                    @endforelse

                    <tr id="archiveNoResult" class="archive-no-result" hidden>
                        <td colspan="6">
                            Tidak ada arsip yang sesuai dengan kata kunci pencarian.
                        </td>
                    </tr>
                </tbody>
                <tr id="archiveNoResult" class="archive-no-result" hidden>
                    <td colspan="6">
                        Tidak ada arsip yang sesuai dengan kata kunci pencarian.
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
        @if ($errors->any())
            <div style="margin: 0 25px 15px; padding: 12px 15px; background: #fef2f2; border: 1px solid #fecaca; border-radius: 8px; color: #b91c1c;">
                <strong>Upload arsip gagal.</strong>

                <ul style="margin: 8px 0 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/admin/arsip') }}" method="POST" enctype="multipart/form-data" class="admin-main-form">
            @csrf
            <div class="modal-body" style="padding: 20px 25px; gap: 16px;">
                
                <div class="form-group">
                    <label for="no_dokumen">Nomor Surat / Kode Berkas</label>
                    <input
                        type="text"
                        id="no_dokumen"
                        name="no_dokumen"
                        value="{{ old('no_dokumen') }}"
                        placeholder="Contoh: 012/PROP/ORG/2026"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="nama_dokumen">Nama / Judul Dokumen</label>
                    <input
                        type="text"
                        id="nama_dokumen"
                        name="nama_dokumen"
                        value="{{ old('nama_dokumen') }}"
                        placeholder="Masukkan judul arsip dokumen..."
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori Berkas</label>
                    <select id="kategori" name="kategori" required>
                        <option value="">-- Pilih Kategori --</option>

                        <option value="Surat Masuk" @selected(old('kategori') === 'Surat Masuk')>
                            Surat Masuk
                        </option>

                        <option value="Surat Keluar" @selected(old('kategori') === 'Surat Keluar')>
                            Surat Keluar
                        </option>

                        <option value="Proposal Kegiatan" @selected(old('kategori') === 'Proposal Kegiatan')>
                            Proposal Kegiatan
                        </option>

                        <option
                            value="Laporan Pertanggungjawaban (LPJ)"
                            @selected(old('kategori') === 'Laporan Pertanggungjawaban (LPJ)')
                        >
                            Laporan Pertanggungjawaban (LPJ)
                        </option>
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

    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('archiveSearch');
        const categoryFilter = document.getElementById('archiveCategoryFilter');
        const clearButton = document.getElementById('clearArchiveSearch');
        const archiveRows = document.querySelectorAll('.archive-row');
        const noResultRow = document.getElementById('archiveNoResult');
        const searchInfo = document.getElementById('archiveSearchInfo');

        function filterArchives() {
            const keyword = searchInput.value.trim().toLowerCase();
            const selectedCategory = categoryFilter.value;
            let visibleCount = 0;

            archiveRows.forEach(function (row) {
                const rowText = row.textContent.toLowerCase();
                const rowCategory = row.dataset.category || '';

                const matchesKeyword = rowText.includes(keyword);

                const matchesCategory =
                    selectedCategory === 'all' ||
                    rowCategory === selectedCategory;

                const isMatch = matchesKeyword && matchesCategory;

                row.hidden = !isMatch;

                if (isMatch) {
                    visibleCount++;
                }
            });

            noResultRow.hidden = visibleCount !== 0;

            if (keyword === '' && selectedCategory === 'all') {
                searchInfo.textContent =
                    `Menampilkan seluruh ${archiveRows.length} data arsip.`;
            } else if (visibleCount === 0) {
                searchInfo.textContent =
                    'Tidak ditemukan arsip yang sesuai dengan pencarian dan filter.';
            } else if (keyword !== '' && selectedCategory !== 'all') {
                searchInfo.textContent =
                    `Ditemukan ${visibleCount} arsip dengan kata kunci "${searchInput.value.trim()}" pada kategori "${selectedCategory}".`;
            } else if (keyword !== '') {
                searchInfo.textContent =
                    `Ditemukan ${visibleCount} arsip yang sesuai dengan kata kunci "${searchInput.value.trim()}".`;
            } else {
                searchInfo.textContent =
                    `Menampilkan ${visibleCount} arsip kategori "${selectedCategory}".`;
            }
        }

        searchInput.addEventListener('input', filterArchives);

        categoryFilter.addEventListener('change', filterArchives);

        clearButton.addEventListener('click', function () {
            searchInput.value = '';
            categoryFilter.value = 'all';

            filterArchives();
            searchInput.focus();
        });

        window.addEventListener('click', function (event) {
            const modal = document.getElementById('uploadArsipModal');

            if (event.target === modal) {
                closeUploadArsipModal();
            }
        });

        filterArchives();
    });
</script>

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            openUploadArsipModal();
        });
    </script>
@endif

@endsection