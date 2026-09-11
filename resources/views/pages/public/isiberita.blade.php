@extends('layouts.app')

@section('title', $berita->title . ' - Publikasi Berita')

@section('content')

<section class="detail-berita-section">
    <div class="detail-berita-container">

        <div class="news-breadcrumb">
            <a href="/">Home</a>
            /
            <span class="current-page">{{ $berita->title }}</span>
        </div>

        <header class="entry-header">

            <span class="category-badge {{ \Illuminate\Support\Str::slug($berita->category) }}">
                {{ strtoupper($berita->category) }}
            </span>

            <h1 class="entry-title">
                {{ $berita->title }}
            </h1>

            <div class="entry-meta">

                <span class="meta-item">
                    <i class="far fa-calendar-alt"></i>
                    {{ $berita->tanggal_kegiatan->format('d M Y') }}
                </span>

                <span class="meta-item">
                    <i class="far fa-user"></i>
                    {{ $berita->divisi }}
                </span>

                <span class="meta-item">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $berita->lokasi }}
                </span>

            </div>

        </header>


        <div class="featured-image-wrapper">

            <img
                src="{{ asset('storage/' . $berita->image) }}"
                alt="{{ $berita->title }}"
            >

        </div>


        <article class="entry-content">

            <p class="lead-text">
                {{ $berita->content }}
            </p>

        </article>

        <div class="back-home-wrapper">
            <a href="{{ url('/') }}" class="back-home-button">
                ← Kembali ke Beranda
            </a>
        </div>

    </div>
</section>

@endsection