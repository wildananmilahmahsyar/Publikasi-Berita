@extends('layouts.admin')

@section('title', 'Perencanaan Program Kerja')

@section('content')
<style>
    #perencanaanProker .proker-header { margin-bottom: 22px; }
    #perencanaanProker .proker-header h2 { margin: 0 0 7px; }
    #perencanaanProker .proker-header p { margin: 0; color: #64748b; }
    #perencanaanProker .proker-form { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; margin-bottom: 24px; }
    #perencanaanProker .proker-form h3 { margin-top: 0; }
    #perencanaanProker .proker-fields { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 14px; }
    #perencanaanProker .proker-field { display: flex; flex-direction: column; gap: 6px; margin-bottom: 12px; }
    #perencanaanProker .proker-field input,
    #perencanaanProker .proker-field textarea { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px; font: inherit; box-sizing: border-box; }
    #perencanaanProker .proker-field textarea { min-height: 88px; resize: vertical; }
    #perencanaanProker .proker-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 310px), 1fr)); gap: 16px; }
    #perencanaanProker .proker-divisi { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px; min-width: 0; }
    #perencanaanProker .proker-divisi h3 { margin: 0; }
    #perencanaanProker .proker-count { display: inline-block; font-size: .85rem; margin: 9px 0 16px; padding: 5px 10px; color: #4338ca; background: #eef2ff; border-radius: 100px; }
    #perencanaanProker .proker-item { padding: 12px 0; border-top: 1px solid #e2e8f0; }
    #perencanaanProker .proker-item strong { display: block; margin-bottom: 6px; }
    #perencanaanProker .proker-item p { margin: 0 0 8px; color: #475569; white-space: pre-wrap; overflow-wrap: anywhere; }
    #perencanaanProker .proker-actions { display: flex; flex-wrap: wrap; align-items: center; gap: 8px; margin-top: 10px; }
    #perencanaanProker .proker-button { padding: 8px 14px; border: 0; border-radius: 7px; color: #fff; background: #4f46e5; cursor: pointer; font: inherit; }
    #perencanaanProker .proker-delete { background: #b91c1c; }
    #perencanaanProker .proker-edit { margin-top: 12px; padding: 12px; background: #f8fafc; border-radius: 8px; }
    #perencanaanProker .proker-message { padding: 12px; margin: 0 0 18px; border-radius: 8px; background: #ecfdf5; color: #065f46; }
    #perencanaanProker .proker-error { background: #fff1f2; color: #9f1239; }
</style>

<div id="perencanaanProker">
    <div class="proker-header">
        <h2>Perencanaan Program Kerja</h2>
        <p>Catat rencana program setiap divisi. Jumlah program kerja dihitung otomatis dari data yang tersimpan.</p>
    </div>

    @if (session('success'))
        <p class="proker-message">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div class="proker-message proker-error">
            <strong>Data belum dapat disimpan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.program-kerja.store') }}" method="POST" class="proker-form">
        @csrf
        <h3>Tambah Rencana Program Kerja</h3>
        <div class="proker-fields">
            <div class="proker-field">
                <label for="proker-nama">Nama Program Kerja</label>
                <input id="proker-nama" type="text" name="nama_program" maxlength="180"
                    value="{{ old('nama_program') }}" placeholder="Contoh: Pelatihan Jurnalistik" required>
            </div>
            <div class="proker-field">
                <label for="proker-divisi">Divisi</label>
                <input id="proker-divisi" type="text" name="divisi" list="opsi-divisi-proker"
                    maxlength="100" value="{{ old('divisi') }}" placeholder="Pilih atau ketik divisi" required>
                <datalist id="opsi-divisi-proker">
                    @foreach ($daftarDivisi as $divisi)
                        <option value="{{ $divisi }}"></option>
                    @endforeach
                </datalist>
            </div>
        </div>
        <div class="proker-field">
            <label for="proker-catatan">Catatan / Rincian Rencana</label>
            <textarea id="proker-catatan" name="catatan" maxlength="2000"
                placeholder="Contoh: Tujuan, sasaran, jadwal, atau kebutuhan kegiatan">{{ old('catatan') }}</textarea>
        </div>
        <button type="submit" class="proker-button">Simpan Program Kerja</button>
    </form>

    <h3>Daftar Program Kerja per Divisi</h3>
    <div class="proker-grid">
        @foreach ($daftarDivisi as $divisi)
            @php($items = $programKerjas->where('divisi', $divisi))
            <section class="proker-divisi">
                <h3>{{ $divisi }}</h3>
                <span class="proker-count">{{ $items->count() }} program kerja</span>

                @forelse ($items as $proker)
                    <div class="proker-item">
                        <strong>{{ $proker->nama_program }}</strong>
                        @if ($proker->catatan)
                            <p>{{ $proker->catatan }}</p>
                        @else
                            <p>Belum ada catatan tambahan.</p>
                        @endif
                        <div class="proker-actions">
                            <details>
                                <summary style="cursor:pointer; color:#4338ca;">Edit</summary>
                                <form class="proker-edit" method="POST"
                                    action="{{ route('admin.program-kerja.update', $proker) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="proker-field">
                                        <label for="edit-nama-{{ $proker->id }}">Nama Program</label>
                                        <input id="edit-nama-{{ $proker->id }}" name="nama_program"
                                            value="{{ $proker->nama_program }}" maxlength="180" required>
                                    </div>
                                    <div class="proker-field">
                                        <label for="edit-divisi-{{ $proker->id }}">Divisi</label>
                                        <input id="edit-divisi-{{ $proker->id }}" name="divisi"
                                            list="opsi-divisi-proker" value="{{ $proker->divisi }}" maxlength="100" required>
                                    </div>
                                    <div class="proker-field">
                                        <label for="edit-catatan-{{ $proker->id }}">Catatan</label>
                                        <textarea id="edit-catatan-{{ $proker->id }}" name="catatan"
                                            maxlength="2000">{{ $proker->catatan }}</textarea>
                                    </div>
                                    <button type="submit" class="proker-button">Simpan Perubahan</button>
                                </form>
                            </details>
                            <form method="POST" action="{{ route('admin.program-kerja.destroy', $proker) }}"
                                onsubmit="return confirm('Yakin ingin menghapus program kerja ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="proker-button proker-delete">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Belum ada program kerja pada divisi ini.</p>
                @endforelse
            </section>
        @endforeach
    </div>
</div>
@endsection
