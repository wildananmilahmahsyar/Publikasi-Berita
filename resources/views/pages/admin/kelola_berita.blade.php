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
        <form method="GET" action="/admin/berita" class="manage-news-search">
            <label for="searchNews">Cari Berita</label>

            <input
                type="search"
                id="searchNews"
                name="q"
                value="{{ $search ?? '' }}"
                placeholder="Cari berdasarkan judul, kategori, atau divisi..."
            >

            <button type="submit">
                Cari
            </button>

            @if (!empty($search))
                <a href="/admin/berita">
                    Reset
                </a>
            @endif
        </form>
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
                            <span class="manage-category-badge {{ \Illuminate\Support\Str::slug($berita->category) }}">
                                {{ strtoupper($berita->category) }}
                            </span>
                        </td>

                        <td>
                            {{ $berita->tanggal_kegiatan->format('d-m-Y') }}
                        </td>

                        <td>
                            <div class="news-action-buttons">
                                <a
                                    href="/admin/berita/{{ $berita->id }}/edit"
                                    class="btn-news-edit"
                                >
                                    Edit
                                </a>

                                <form
                                    action="/admin/berita/{{ $berita->id }}"
                                    method="POST"
                                    class="form-news-delete"
                                    onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-news-delete"
                                    >
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @empty

                    <tr class="news-empty-row">
                        <td colspan="5">
                            <div class="news-empty-state">
                                <div class="news-empty-icon">📰</div>

                                @if (!empty($search))
                                    <h3>Berita Tidak Ditemukan</h3>

                                    <p>
                                        Tidak ada berita yang sesuai dengan kata kunci
                                        "{{ $search }}".
                                    </p>

                                    <a href="/admin/berita" class="btn-empty-add-news">
                                        Tampilkan Semua Berita
                                    </a>
                                @else
                                    <h3>Belum Ada Berita</h3>

                                    <p>
                                        Data berita dan kegiatan belum tersedia pada sistem.
                                        Tambahkan berita pertama untuk memulai publikasi.
                                    </p>

                                    <a href="/admin/berita/create" class="btn-empty-add-news">
                                        + Tambah Berita
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>

                @endforelse

            </tbody>
        </table>
    </div>

</div>
@endsection