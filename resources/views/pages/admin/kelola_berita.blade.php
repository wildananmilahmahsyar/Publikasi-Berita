@extends('layouts.admin')

@section('title', 'Kelola Berita & Kegiatan')

@section('content')
<div class="manage-news-container">

    <div class="manage-news-header">
        <div>
            <h2>Kelola Berita & Kegiatan</h2>
            <p>
                Kelola publikasi berita dan kegiatan organisasi melalui halaman ini.
            </p>
        </div>

        <a href="/admin/berita/create" class="btn-add-news">
            + Tambah Berita
        </a>
    </div>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="manage-news-toolbar">
        <div class="manage-news-search">
            <label for="searchNews">Cari Berita</label>
            <input
                type="search"
                id="searchNews"
                placeholder="Cari berdasarkan judul atau kategori..."
                disabled
            >
            <small>
                Fitur pencarian belum digunakan pada skenario ini.
            </small>
        </div>
    </div>

    <div class="manage-news-table-wrapper">
        <table class="manage-news-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($beritas as $berita)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $berita->title }}
                        </td>

                        <td>
                            {{ $berita->category }}
                        </td>

                        <td>
                            {{ $berita->tanggal_kegiatan->format('d-m-Y') }}
                        </td>

                        <td>
                            <span>
                                Tersimpan
                            </span>
                        </td>
                    </tr>

                @empty

                    <tr class="news-empty-row">
                        <td colspan="5">
                            <div class="news-empty-state">
                                <div class="news-empty-icon">📰</div>

                                <h3>Belum Ada Berita</h3>

                                <p>
                                    Data berita dan kegiatan belum tersedia pada sistem.
                                    Tambahkan berita pertama untuk memulai publikasi.
                                </p>

                                <a href="/admin/berita/create" class="btn-empty-add-news">
                                    + Tambah Berita
                                </a>
                            </div>
                        </td>
                    </tr>

                @endforelse

            </tbody>
        </table>
    </div>

</div>
@endsection