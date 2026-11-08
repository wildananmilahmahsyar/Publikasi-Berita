@extends('layouts.app')

@section('title', 'Dokumentasi Kegiatan Organisasi')

@section('content')
<style>
    /* CONF-SEQ-1: Memperkecil card kegiatan terlaksana */
    .kegiatan-section .kegiatan-list-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, 260px);
        gap: 18px;
        justify-content: start;
    }

    .kegiatan-section .kegiatan-item-card {
        width: 100%;
        max-width: 260px;
        overflow: hidden;
    }

    .kegiatan-section .kegiatan-img {
        height: 160px;
    }

    .kegiatan-section .kegiatan-img img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .kegiatan-section .kegiatan-info {
        padding: 14px;
    }

    .kegiatan-section .kegiatan-info p {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
    }

    @media (max-width: 600px) {
        .kegiatan-section .kegiatan-list-grid {
            grid-template-columns: minmax(0, 1fr);
        }

        .kegiatan-section .kegiatan-item-card {
            max-width: 100%;
        }
    }
</style>
<section class="kegiatan-section">
    <div class="kegiatan-container">
        
        <div class="kegiatan-header">
            <h2>Dokumentasi & Agenda Kegiatan</h2>
            <p>Daftar rekapitulasi seluruh program kerja dan agenda resmi organisasi yang telah sukses dilaksanakan maupun yang akan datang.</p>
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
{{-- CONF-SEQ-2: aktifkan filter divisi --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const section = document.querySelector('.kegiatan-section');
    if (!section) return;

    const buttons = section.querySelectorAll('.filter-kegiatan .filter-btn');
    const grid = section.querySelector('.kegiatan-list-grid');
    if (!grid) return;

    const cards = Array.from(grid.querySelectorAll('.kegiatan-item-card'));

    const emptyMessage = document.createElement('p');
    emptyMessage.textContent = 'Tidak ada kegiatan pada divisi ini.';
    emptyMessage.style.cssText = 'grid-column: 1 / -1; text-align: center; padding: 20px; display: none;';
    grid.appendChild(emptyMessage);

    buttons.forEach(function (button) {
        button.type = 'button';

        button.addEventListener('click', function () {
            const filter = button.textContent.trim().toLowerCase();

            buttons.forEach(function (btn) {
                btn.classList.toggle('active', btn === button);
            });

            let visibleCount = 0;

            cards.forEach(function (card) {
                const divisi = (card.querySelector('.divisi-tag')?.textContent || '')
                    .trim().toLowerCase();

                const cocok =
                    filter === 'semua' ||
                    (filter === 'humas' &&
                        (divisi.includes('humas') || divisi.includes('hubungan masyarakat'))) ||
                    (filter === 'kaderisasi' && divisi.includes('kaderisasi')) ||
                    (filter === 'minat & bakat' &&
                        (divisi.includes('minat') || divisi.includes('bakat')));

                card.style.display = cocok ? '' : 'none';

                if (cocok) visibleCount++;
            });

            emptyMessage.style.display =
                visibleCount === 0 && cards.length > 0 ? 'block' : 'none';
        });
    });
});
</script>
@endsection
