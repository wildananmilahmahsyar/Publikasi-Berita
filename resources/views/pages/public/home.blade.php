@extends('layouts.app')

@section('title', 'Beranda - Publikasi Berita')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | PEMBAGIAN BERITA HOMEPAGE
    |--------------------------------------------------------------------------
    |
    | #1      = card utama
    | #2 - #3 = card samping
    | #4 - #20 = daftar berita bawah
    |
    | TRENDING sementara mengambil maksimal 7 berita terbaru.
    | Data trending boleh berulang dengan card lain karena pada S2.1
    | belum ada perhitungan jumlah view/popularitas.
    |
    */

    $beritaUtama = $beritas->first();
    $beritaSamping = $beritas->slice(1, 2);
    $beritaList = $beritas->slice(3, 17);
    $beritaTrending = $beritas->take(7);
@endphp

<section class="home-section">
    <div class="magazine-container">

        {{-- =========================================================
             FEATURED NEWS
        ========================================================== --}}

        @if ($beritaUtama)

            <div class="news-grid">

                {{-- CARD UTAMA --}}
                <a
                    href="{{ url('/isiberita/' . $beritaUtama->id) }}"
                    class="news-card main-card"
                >
                    <img
                        src="{{ asset('storage/' . $beritaUtama->image) }}"
                        alt="{{ $beritaUtama->title }}"
                        class="news-card-image"
                    >

                    <div class="card-content">

                        <span class="category-tag {{ \Illuminate\Support\Str::slug($beritaUtama->category) }}">
                            {{ strtoupper($beritaUtama->category) }}
                        </span>

                        <h3>
                            {{ $beritaUtama->title }}
                        </h3>

                        <div class="card-meta">
                            <span class="meta-date">
                                {{ $beritaUtama->tanggal_kegiatan->format('d M Y') }}
                            </span>

                            <span class="meta-author">
                                {{ $beritaUtama->divisi }}
                            </span>
                        </div>

                    </div>
                </a>


                {{-- CARD SAMPING --}}
                @if ($beritaSamping->isNotEmpty())

                    <div class="side-cards">

                        @foreach ($beritaSamping as $berita)

                            <a
                                href="{{ url('/isiberita/' . $berita->id) }}"
                                class="news-card sub-card"
                            >
                                <img
                                    src="{{ asset('storage/' . $berita->image) }}"
                                    alt="{{ $berita->title }}"
                                    class="news-card-image"
                                >

                                <div class="card-content">

                                    <span class="category-tag {{ \Illuminate\Support\Str::slug($berita->category) }}">
                                        {{ strtoupper($berita->category) }}
                                    </span>

                                    <h3>
                                        {{ $berita->title }}
                                    </h3>

                                </div>
                            </a>

                        @endforeach

                    </div>

                @endif

            </div>

        @else

            {{-- JIKA DATABASE BELUM MEMILIKI BERITA --}}
            <div class="news-grid">

                <div class="news-card main-card">

                    <img
                        src="{{ asset('picture/sampel.jpg') }}"
                        alt="Belum Ada Berita"
                        class="news-card-image"
                    >

                    <div class="card-content">

                        <span class="category-tag">
                            BERITA
                        </span>

                        <h3>
                            Belum ada berita yang dipublikasikan.
                        </h3>

                    </div>

                </div>

            </div>

        @endif


        {{-- =========================================================
             LAYOUT BAWAH
        ========================================================== --}}

        <div class="main-layout-wrapper">

            {{-- =====================================================
                 SISI KIRI - KEGIATAN / DAFTAR BERITA
            ====================================================== --}}

            <div class="left-content-area">

                <div class="section-title-wrapper">

                    <h2 class="section-title-text">
                        Kegiatan
                    </h2>

                    <a href="{{ url('/kegiatan') }}" class="view-all-link">
                        View All >>
                    </a>

                </div>

                <div class="horizontal-news-list">

                    @foreach ($beritaList as $berita)

                        <article class="horizontal-card">

                            <div class="horizontal-card-img">

                                <a href="{{ url('/isiberita/' . $berita->id) }}">

                                    <img
                                        src="{{ asset('storage/' . $berita->image) }}"
                                        alt="{{ $berita->title }}"
                                    >

                                </a>

                            </div>


                            <div class="horizontal-card-body">

                                <h3>
                                    <a
                                        href="{{ url('/isiberita/' . $berita->id) }}"
                                        style="color: inherit; text-decoration: none;"
                                    >
                                        {{ $berita->title }}
                                    </a>
                                </h3>


                                <div class="horizontal-meta">
                                    <span>
                                        {{ $berita->tanggal_kegiatan->format('d M Y') }}
                                    </span>
                                </div>


                                <p>
                                    {{
                                        \Illuminate\Support\Str::limit(
                                            strip_tags($berita->content),
                                            180
                                        )
                                    }}
                                </p>

                            </div>

                        </article>

                    @endforeach

                </div>

            </div>


            {{-- =====================================================
                 SISI KANAN - TRENDING
            ====================================================== --}}

            <aside class="right-sidebar">

                <div class="section-title-wrapper trending-border">

                    <h2 class="section-title-text">
                        TRENDING
                    </h2>

                </div>


                <div class="trending-list">

                    @forelse ($beritaTrending as $berita)

                        <a
                            href="{{ url('/isiberita/' . $berita->id) }}"
                            class="trending-item"
                        >

                            <div class="trending-text">

                                <h3>
                                    {{ $berita->title }}
                                </h3>


                                <div class="trending-meta">

                                    <span>
                                        {{ $berita->divisi }}
                                    </span>

                                    <span class="meta-separator">
                                        |
                                    </span>

                                    <span>
                                        {{ $berita->tanggal_kegiatan->format('d M Y') }}
                                    </span>

                                </div>

                            </div>


                            <div class="trending-thumb">

                                <img
                                    src="{{ asset('storage/' . $berita->image) }}"
                                    alt="{{ $berita->title }}"
                                >

                            </div>

                        </a>

                    @empty

                        <p>
                            Belum ada berita.
                        </p>

                    @endforelse

                </div>

            </aside>

        </div>

    </div>
</section>

@endsection