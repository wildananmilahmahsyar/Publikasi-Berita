@extends('layouts.app')

@section('title', 'Hubungi Kami - Publikasi Berita')

@section('content')
<section class="kontak-section">
    <div class="kontak-container">
        
        <div class="kontak-header">
            <h2>Hubungi Kami</h2>
            <p>Punya pertanyaan, saran, atau ingin membagikan artikel ? Silakan hubungi redaksi kami melalui formulir atau kontak di bawah ini.</p>
        </div>

        <div class="kontak-wrapper">
            
            <div class="kontak-info-area">
                <div class="info-box">
                    <h3>Sekretariat Organisasi</h3>
                    <p>Jl. Jenderal Sudirman No. 12, Kota Parepare, Sulawesi Selatan, Indonesia</p>
                </div>

                <div class="info-box">
                    <h3>Surel & Elektronik</h3>
                    <p><strong>Email:</strong> redaksi@organisasi.or.id</p>
                    <p><strong>Pers / Media:</strong> media@organisasi.or.id</p>
                </div>

                <div class="info-box">
                    <h3>Layanan Telepon</h3>
                    <p><strong>WhatsApp:</strong> +62 812-3456-7890</p>
                    <p><strong>Telepon:</strong> (0421) 12345</p>
                </div>

                <div class="info-box">
                    <h3>Jam Operasional Redaksi</h3>
                    <p>Senin - Jumat: 09.00 - 17.00 WITA</p>
                    <p>Sabtu: 09.00 - 12.00 WITA</p>
                </div>
            </div>

            <div class="kontak-form-area">
                <form action="#" method="POST" class="elegan-form">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" name="email" placeholder="nama@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="subjek">Subjek / Perihal</label>
                        <input type="text" id="subjek" name="subjek" placeholder="Contoh: Kemitraan, Saran Konten" required>
                    </div>

                    <div class="form-group">
                        <label for="pesan">Pesan Anda</label>
                        <textarea id="pesan" name="pesan" rows="5" placeholder="Tuliskan pesan atau detail informasi kegiatan di sini..." required></textarea>
                    </div>

                    <button type="submit" class="btn-kirim">Kirim Pesan</button>
                </form>
            </div>

        </div>

    </div>
</section>
@endsection