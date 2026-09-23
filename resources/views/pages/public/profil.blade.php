@extends('layouts.app')

@section('title', 'Profil Organisasi - Publikasi Berita')

@section('content')

<section class="profil-section">
    <div class="profil-container">

        <div class="profil-header">
            <h2>Profil Organisasi</h2>
            <p>Mengenal lebih dekat sejarah, visi, misi, dan struktur kepengurusan organisasi kami.</p>
        </div>

        <div class="profil-content-block">
            <div class="section-title-line">
                <h3>Sejarah & Latar Belakang</h3>
            </div>

            <div class="text-content">
                @foreach (preg_split('/\r\n|\r|\n/', $profil->sejarah) as $paragraf)
                    @if (trim($paragraf) !== '')
                        <p>{{ $paragraf }}</p>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="profil-grid">

            <div class="vision-mission-box">
                <div class="section-title-line">
                    <h3>Visi Kami</h3>
                </div>

                <p>{{ $profil->visi }}</p>
            </div>

            <div class="vision-mission-box">
                <div class="section-title-line">
                    <h3>Misi Kami</h3>
                </div>

                <ul>
                    @foreach (preg_split('/\r\n|\r|\n/', $profil->misi) as $misi)
                        @if (trim($misi) !== '')
                            <li>{{ $misi }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>

        </div>

        <div class="profil-content-block">

            <div class="section-title-line">
                <h3>Struktur Organisasi</h3>
            </div>

            <div class="text-content">
                <p>
                    Berikut adalah bagan struktur kepengurusan organisasi periode 2026-2027
                    yang menjalankan roda operasional dan koordinasi antar divisi.
                </p>
            </div>

            <div class="structure-image-container">

                @if ($profil->structure_image)
                    <img
                        src="{{ asset('storage/' . $profil->structure_image) }}"
                        alt="Bagan Struktur Organisasi">
                @else
                    <img
                        src="{{ url('/picture/struktur.jpg') }}"
                        alt="Bagan Struktur Organisasi">
                @endif

            </div>

        </div>

        <div class="core-values-section">

            <div class="section-title-line">
                <h3>Nilai-Nilai Kami</h3>
            </div>

            <div class="values-grid">

                <div class="value-item">
                    <i class="fas fa-check-circle"></i>
                    <h4>{{ $profil->nilai_1_title }}</h4>
                    <p>{{ $profil->nilai_1_desc }}</p>
                </div>

                <div class="value-item">
                    <i class="fas fa-users"></i>
                    <h4>{{ $profil->nilai_2_title }}</h4>
                    <p>{{ $profil->nilai_2_desc }}</p>
                </div>

                <div class="value-item">
                    <i class="fas fa-lightbulb"></i>
                    <h4>{{ $profil->nilai_3_title }}</h4>
                    <p>{{ $profil->nilai_3_desc }}</p>
                </div>

            </div>

        </div>

    </div>
</section>

@endsection