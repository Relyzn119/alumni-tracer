@extends('Partials.AdminDashboard')
@section('title', 'Tracer Alumni')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none mb-4">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="page-title mt-3">
                            Verifikasi Data Tracer Study Alumni
                        </h2>
                        <nav aria-label="breadcrumb" class="ms-auto">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tracer Alumni</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary-lt">
                <h3 class="card-title text-primary"><i class="fa-solid fa-list-check me-2"></i> Daftar Pengisian Kuesioner Tracer Alumni</h3>
            </div>
            <div class="table-responsive m-3">
                <table class="table table-bordered table-striped" id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama Alumni</th>
                            <th>Prodi</th>
                            <th>Status Pekerjaan Saat Ini</th>
                            <th>Nama Perusahaan / Instansi</th>
                            <th>Status Verifikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tracers as $item)
                            @php
                                $status_text = [
                                    1 => 'Bekerja',
                                    2 => 'Belum Memungkinkan Kerja',
                                    3 => 'Wiraswasta',
                                    4 => 'Lanjut Studi',
                                    5 => 'Mencari Kerja'
                                ];
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->alumni->npm ?? '-' }}</td>
                                <td><strong>{{ $item->alumni->nama ?? '-' }}</strong></td>
                                <td>{{ $item->alumni->prodis->prodi ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-blue-lt">
                                        {{ $status_text[$item->f8_status] ?? 'Lainnya' }}
                                    </span>
                                </td>
                                <td>{{ $item->f5c_nama_instansi ?? $item->f18b_perguruan_tinggi ?? '-' }}</td>
                                <td>
                                    <span class="badge {{ $item->status_approval == 1 ? 'bg-teal text-teal-lt' : 'bg-danger text-red-lt' }} p-1 rounded">
                                        {{ $item->status_approval == 1 ? 'Approved' : 'Pending' }}
                                    </span>
                                </td>
                                <td class="d-flex gap-1">
                                    <!-- Button Modal Detail -->
                                    <button type="button" class="btn btn-dark btn-sm" title="Detail Kuesioner"
                                        data-bs-toggle="modal" data-bs-target="#detailTracer{{ $item->id }}">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>

                                    <!-- Button Edit (Baru) -->
                                    <a href="{{ route('tracer-alumni.edit', $item->id) }}" title="Edit Data Kuesioner"
                                        class="btn btn-primary btn-sm">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <!-- Button Approve -->
                                    <a href="{{ route('admin.tracer.approve', $item->id) }}" title="Approve"
                                        class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </a>

                                    <!-- Button Pending -->
                                    <a href="{{ route('admin.tracer.pending', $item->id) }}" title="Set Pending"
                                        class="btn btn-warning btn-sm text-white">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>

                                    <!-- Form Hapus -->
                                    <form action="{{ route('tracer-alumni.destroy', $item->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- MODAL DETAIL REVIEW -->
                @foreach ($tracers as $item)
                    <div class="modal fade" id="detailTracer{{ $item->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title text-white"><i class="fa-solid fa-clipboard-check me-2"></i> Detail Pengisian Tracer Study - {{ $item->alumni->nama ?? '-' }}</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="fw-bold text-primary">A. Data Kontak / Identitas Tambahan</h5>
                                    <table class="table table-bordered mb-4">
                                        <tr><th width="30%">NIK</th><td>{{ $item->nik ?? '-' }}</td></tr>
                                        <tr><th>NPWP</th><td>{{ $item->npwp ?? '-' }}</td></tr>
                                        <tr><th>No. HP / Whatsapp</th><td>{{ $item->no_hp ?? '-' }}</td></tr>
                                    </table>

                                    <h5 class="fw-bold text-primary">B. Karir & Pekerjaan Saat Ini</h5>
                                    <table class="table table-bordered mb-4">
                                        <tr><th width="30%">Status Utama</th><td><strong>{{ $status_text[$item->f8_status] ?? '-' }}</strong></td></tr>
                                        <tr><th>Nama Perusahaan / Instansi</th><td>{{ $item->f5c_nama_instansi ?? '-' }}</td></tr>
                                        <tr><th>Tingkat Tempat Kerja</th><td>{{ $item->f5d_tingkat_instansi ?? '-' }}</td></tr>
                                        <tr><th>Lokasi Kerja</th><td>{{ $item->f5a1_provinsi ?? '-' }} {{ $item->f5a2_kabupaten ? '('.$item->f5a2_kabupaten.')' : '' }}</td></tr>
                                        <tr><th>Estimasi Pendapatan</th><td>Rp {{ number_format($item->f505_gaji ?? 0, 0, ',', '.') }}</td></tr>
                                    </table>

                                    <h5 class="fw-bold text-primary">C. Studi Lanjut (Jika Ada)</h5>
                                    <table class="table table-bordered">
                                        <tr><th width="30%">Perguruan Tinggi</th><td>{{ $item->f18b_perguruan_tinggi ?? '-' }}</td></tr>
                                        <tr><th>Program Studi</th><td>{{ $item->f18c_prodi ?? '-' }}</td></tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <a href="{{ route('tracer-alumni.edit', $item->id) }}" class="btn btn-primary">
                                        <i class="fa-regular fa-pen-to-square me-1"></i> Edit Data Ini
                                    </a>
                                    <a href="{{ route('admin.tracer.approve', $item->id) }}" class="btn btn-success">
                                        <i class="fa-solid fa-circle-check me-1"></i> Approve Data Ini
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection