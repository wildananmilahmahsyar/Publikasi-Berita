@extends('layouts.app')

@section('title', 'Dokumentasi Kegiatan Organisasi')

@section('content')
<section class="kegiatan-section">
    <div class="kegiatan-container">
        
        <div class="kegiatan-header">
            <h2>Dokumentasi & Agenda Kegiatan</h2>
            <p>Daftar rekapitulasi seluruh program kerja dan agenda resmi organisasi yang telah sukses dilaksanakan maupun yang akan datang.</p>
        </div>

        <div class="upcoming-events-section">
            <h3 class="sub-title">Agenda Mendatang</h3>

            <div class="upcoming-grid">
                @forelse ($agendas as $agenda)
                    <div class="upcoming-card">
                        <div class="event-date">
                            {{ $agenda->tanggal_agenda->format('d') }}
                            <span>{{ $agenda->tanggal_agenda->format('M') }}</span>
                        </div>

                        <div class="event-details">
                            <h4>{{ $agenda->judul }}</h4>

                            <p>
                                {{ $agenda->divisi }}
                                &bull;
                                {{ substr($agenda->waktu_agenda, 0, 5) }} WITA
                                &bull;
                                {{ $agenda->lokasi }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="upcoming-card">
                        <div class="event-details">
                            <h4>Belum Ada Agenda Mendatang</h4>
                            <p>Agenda baru akan ditampilkan setelah ditambahkan oleh Sekretaris.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="filter-kegiatan">
            <span class="filter-label">Saring Divisi:</span>
            <button class="filter-btn active">Semua</button>
            <button class="filter-btn">Humas</button>
            <button class="filter-btn">Kaderisasi</button>
            <button class="filter-btn">Minat & Bakat</button>
        </div>

        <h3 class="sub-title">Kegiatan yang Telah Terlaksana</h3>

        <div class="kegiatan-list-grid">
            @forelse ($kegiatans as $kegiatan)
                <div class="kegiatan-item-card">
                    <div class="kegiatan-img">
                        @if ($kegiatan->image)
                            <img
                                src="{{ asset('storage/' . $kegiatan->image) }}"
                                alt="{{ $kegiatan->title }}">
                        @else
                            <img
                                src="{{ url('/picture/sampel.jpg') }}"
                                alt="Gambar Kegiatan">
                        @endif

                        <span class="divisi-tag">
                            {{ $kegiatan->divisi ?: 'Umum' }}
                        </span>
                    </div>

                    <div class="kegiatan-info">
                        <span class="kegiatan-date">
                            {{ $kegiatan->tanggal_kegiatan?->format('d M Y') ?? '-' }}
                        </span>

                        <h4>
                            <a href="{{ url('/isiberita/' . $kegiatan->id) }}">
                                {{ $kegiatan->title }}
                            </a>
                        </h4>

                        <p>
                            {{ \Illuminate\Support\Str::limit(strip_tags($kegiatan->content), 150) }}
                        </p>

                        <a
                            href="{{ url('/isiberita/' . $kegiatan->id) }}"
                            class="read-more-link">
                            Lihat Dokumentasi →
                        </a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 30px;">
                    <p>Belum ada berita dengan kategori Kegiatan.</p>
                </div>
            @endforelse
        </div>

    </div>
</section>
@endsection
