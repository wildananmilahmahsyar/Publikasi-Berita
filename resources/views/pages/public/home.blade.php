@extends('layouts.app')

@section('title', 'Beranda - Publikasi Berita')

@section('content')

<section class="home-section">
    <div class="magazine-container">
        
        <div class="news-grid">
            <a href="{{ url('/isiberita') }}" 
            class="news-card main-card"
            style="background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.9)), url('/picture/sampel.jpg');">
                <div class="card-content">
                    <span class="category-tag latest">LATEST NEWS</span>
                    <h3>New Artist Takes The Music Scene By Storm With Unforgettable Memory</h3>
                    <div class="card-meta">
                        <span class="meta-date">May 05, 2025</span>
                        <span class="meta-author">By Moana Doe</span>
                    </div>
                </div>
            </a>

            <div class="side-cards">
                <a href="{{ url('/isiberita') }}" class="news-card sub-card" style="background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.9)), url('/picture/sampel.jpg');">
                    <div class="card-content">
                        <span class="category-tag gadgets">GADGETS</span>
                        <h3>New Smartphone Feature Could Change Way We Use Devices</h3>
                    </div>
                </a>

                <a href="{{ url('/isiberita') }}" class="news-card sub-card" style="background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.9)), url('/picture/sampel.jpg');">
                    <div class="card-content">
                        <span class="category-tag sports">SPORTS</span>
                        <h3>Underdog Team Triumphs In A Thrilling Final Match</h3>
                    </div>
                </a>
            </div>
        </div>

        <div class="main-layout-wrapper">
            
            <div class="left-content-area">
                <div class="section-title-wrapper">
                    <h2 class="section-title-text">Kegiatan</h2>
                    <a href="{{ url('/kegiatan') }}" class="view-all-link">View All >></a>
                </div>

                <div class="horizontal-news-list">
                    @for($i = 1; $i <= 10; $i++)
                    <article class="horizontal-card">
                        <div class="horizontal-card-img">
                            <a href="{{ url('/isiberita') }}">
                                <img src="{{ asset('picture/sampel.jpg') }}" alt="Sampel Berita">
                            </a>
                        </div>
                        <div class="horizontal-card-body">
                            <h3>
                                <a href="{{ url('/isiberita') }}" style="color: inherit; text-decoration: none;">
                                    Climate Change Demands Urgent Action Global Leaders Today (Contoh #{{ $i }})
                                </a>
                            </h3>
                            <div class="horizontal-meta">
                                <span>May 05, 2025</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Mauris rhoncus est vitae efficitur.</p>
                        </div>
                    </article>
                    @endfor
                </div>
            </div>

            <aside class="right-sidebar">
                <div class="section-title-wrapper trending-border">
                    <h2 class="section-title-text">TRENDING</h2>
                </div>

                <div class="trending-list">
                    @for($j = 1; $j <= 7; $j++)
                    <a href="{{ url('/isiberita') }}" class="trending-item">
                        <div class="trending-text">
                            <h3>Contoh Judul Berita Trending Yang Sangat Viral dan Populer Hari Ini #{{ $j }}</h3>
                            <div class="trending-meta">
                                <span>Nama Penulis</span>
                                <span class="meta-separator">|</span>
                                <span>6 jam yang lalu</span>
                            </div>
                        </div>
                        <div class="trending-thumb">
                            <img src="{{ asset('picture/sampel.jpg') }}" alt="Trending">
                        </div>
                    </a>
                    @endfor
                </div>
            </aside>

        </div>

    </div>
</section>

@endsection