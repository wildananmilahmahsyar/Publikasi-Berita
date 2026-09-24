@extends('layouts.admin')

@section('title', 'Kelola Agenda Mendatang')

@section('content')

@if (session('success'))
    <div style="
        margin-bottom: 20px;
        padding: 12px 15px;
        background-color: #ecfdf5;
        border: 1px solid #a7f3d0;
        border-radius: 8px;
        color: #065f46;
        font-weight: 600;
    ">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div style="
        margin-bottom: 20px;
        padding: 12px 15px;
        background-color: #fff1f2;
        border: 1px solid #fecdd3;
        border-radius: 8px;
        color: #9f1239;
    ">
        <strong>Data agenda belum dapat disimpan.</strong>
        <ul style="margin: 8px 0 0 18px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="activity-log-container" style="margin-top: 0;">
    <div class="form-header"
         style="border-bottom: 1px solid var(--border-light); padding-bottom: 15px; margin-bottom: 25px;">
        <h2>Kelola Agenda Mendatang</h2>
        <p>
            Tambahkan agenda organisasi yang akan ditampilkan pada halaman Kegiatan publik.
        </p>
    </div>

    <form
        action="{{ route('admin.agenda.store') }}"
        method="POST"
        class="admin-main-form"
        style="margin-bottom: 30px;"
    >
        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label for="judul">Nama Agenda</label>
                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="{{ old('judul') }}"
                    maxlength="150"
                    placeholder="Contoh: Rapat Koordinasi Triwulan"
                    required
                >
            </div>

            <div class="form-group">
                <label for="divisi">Divisi</label>
                <input
                    type="text"
                    id="divisi"
                    name="divisi"
                    value="{{ old('divisi') }}"
                    maxlength="100"
                    placeholder="Contoh: Divisi Humas"
                    required
                >
            </div>

            <div class="form-group">
                <label for="tanggal_agenda">Tanggal Agenda</label>
                <input
                    type="date"
                    id="tanggal_agenda"
                    name="tanggal_agenda"
                    value="{{ old('tanggal_agenda') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="waktu_agenda">Waktu</label>
                <input
                    type="time"
                    id="waktu_agenda"
                    name="waktu_agenda"
                    value="{{ old('waktu_agenda') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input
                    type="text"
                    id="lokasi"
                    name="lokasi"
                    value="{{ old('lokasi') }}"
                    maxlength="150"
                    placeholder="Contoh: Aula Sekretariat"
                    required
                >
            </div>

        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn-submit">
                Tambah Agenda
            </button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="admin-dashboard-table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Nama Agenda</th>
                    <th>Divisi</th>
                    <th>Lokasi</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($agendas as $agenda)
                    <tr>
                        <td>
                            {{ $agenda->tanggal_agenda->format('d M Y') }}
                        </td>

                        <td>
                            {{ substr($agenda->waktu_agenda, 0, 5) }} WITA
                        </td>

                        <td class="user-actor">
                            {{ $agenda->judul }}
                        </td>

                        <td>
                            {{ $agenda->divisi }}
                        </td>

                        <td>
                            {{ $agenda->lokasi }}
                        </td>

                        <td style="text-align: center;">
                            <form
                                action="{{ route('admin.agenda.destroy', $agenda) }}"
                                method="POST"
                                style="display: inline-block;"
                                onsubmit="return confirm('Yakin ingin menghapus agenda ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-cancel"
                                    style="
                                        padding: 6px 12px;
                                        font-size: 0.85rem;
                                        background-color: #ffeef0;
                                        color: var(--danger-red);
                                        border: none;
                                        cursor: pointer;
                                    "
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td
                            colspan="6"
                            style="text-align: center; padding: 25px; color: var(--text-muted);"
                        >
                            Belum ada agenda mendatang.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection