@extends('Partials.AdminDashboard')
@section('title', 'Edit Tracer Alumni')

@section('content')
<div class="container-xl my-4">
    <div class="page-header d-print-none mb-4">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title text-primary">
                    <i class="fa-regular fa-pen-to-square me-2"></i> Edit Data Kuesioner Tracer Study - {{ $tracer->alumni->nama ?? '-' }}
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tracer-alumni.index') }}">Tracer Alumni</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Kuesioner</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <form action="{{ route('tracer-alumni.update', $tracer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- SECTION: VERIFIKASI & IDENTITAS -->
        <div class="card mb-4 shadow-sm border-primary">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title text-white"><i class="fa-solid fa-id-card me-2"></i> Status Verifikasi & Identitas</h3>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Status Verifikasi Admin</label>
                        <select name="status_approval" class="form-select bg-light">
                            <option value="1" {{ $tracer->status_approval == 1 ? 'selected' : '' }}>APPROVED (Disetujui & Tampil Publik)</option>
                            <option value="0" {{ $tracer->status_approval == 0 ? 'selected' : '' }}>PENDING (Menunggu Verifikasi)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NPM Alumni</label>
                        <input type="text" class="form-control bg-light" value="{{ $tracer->alumni->npm ?? '-' }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control" value="{{ old('nik', $tracer->nik) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">NPWP</label>
                        <input type="text" name="npwp" class="form-control" value="{{ old('npwp', $tracer->npwp) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">No. HP / Whatsapp</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $tracer->no_hp) }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION: STATUS UTAMA (SOAL 1) -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary-lt">
                <h3 class="card-title text-primary"><i class="fa-solid fa-user-doctor me-2"></i> 1. Status Utama Saat Ini</h3>
            </div>
            <div class="card-body">
                <select name="f8_status" class="form-select" id="f8_status">
                    <option value="1" {{ $tracer->f8_status == 1 ? 'selected' : '' }}>1. Bekerja (Full Time / Part Time)</option>
                    <option value="3" {{ $tracer->f8_status == 3 ? 'selected' : '' }}>3. Wiraswasta / Pemilik Usaha</option>
                    <option value="4" {{ $tracer->f8_status == 4 ? 'selected' : '' }}>4. Melanjutkan Pendidikan</option>
                    <option value="5" {{ $tracer->f8_status == 5 ? 'selected' : '' }}>5. Tidak Kerja Tetapi Sedang Mencari Kerja</option>
                    <option value="2" {{ $tracer->f8_status == 2 ? 'selected' : '' }}>2. Belum Memungkinkan Bekerja</option>
                </select>
            </div>
        </div>

        <!-- SECTION: BEKERJA & WIRASWASTA (SOAL 2-8, 11, 12) -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-info-lt">
                <h3 class="card-title text-info"><i class="fa-solid fa-briefcase me-2"></i> Detail Pekerjaan / Wiraswasta</h3>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">2. Masa Tunggu Kerja (Bulan)</label>
                        <input type="number" name="f502_bulan_cari_kerja" class="form-control" value="{{ old('f502_bulan_cari_kerja', $tracer->f502_bulan_cari_kerja) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3. Gaji / Pendapatan Per Bulan (Rp)</label>
                        <input type="number" name="f505_gaji" class="form-control" value="{{ old('f505_gaji', $tracer->f505_gaji) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4a. Provinsi Tempat Kerja</label>
                        <input type="text" name="f5a1_provinsi" class="form-control" value="{{ old('f5a1_provinsi', $tracer->f5a1_provinsi) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4b. Kota / Kabupaten Tempat Kerja</label>
                        <input type="text" name="f5a2_kabupaten" class="form-control" value="{{ old('f5a2_kabupaten', $tracer->f5a2_kabupaten) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">5. Jenis Instansi</label>
                        <select name="f1101_jenis_instansi" class="form-select">
                            <option value="">-- Pilih --</option>
                            <option value="1" {{ $tracer->f1101_jenis_instansi == 1 ? 'selected' : '' }}>Instansi Pemerintah</option>
                            <option value="2" {{ $tracer->f1101_jenis_instansi == 2 ? 'selected' : '' }}>Organisasi Non-Profit</option>
                            <option value="3" {{ $tracer->f1101_jenis_instansi == 3 ? 'selected' : '' }}>Perusahaan Swasta</option>
                            <option value="4" {{ $tracer->f1101_jenis_instansi == 4 ? 'selected' : '' }}>Wiraswasta</option>
                            <option value="5" {{ $tracer->f1101_jenis_instansi == 5 ? 'selected' : '' }}>BUMN/BUMD</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">6. Nama Perusahaan / Instansi</label>
                        <input type="text" name="f5c_nama_instansi" class="form-control" value="{{ old('f5c_nama_instansi', $tracer->f5c_nama_instansi) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">8. Tingkat Instansi</label>
                        <select name="f5d_tingkat_instansi" class="form-select">
                            <option value="">-- Pilih --</option>
                            <option value="Lokal/Wilayah" {{ $tracer->f5d_tingkat_instansi == 'Lokal/Wilayah' ? 'selected' : '' }}>Lokal / Wilayah</option>
                            <option value="Nasional" {{ $tracer->f5d_tingkat_instansi == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="Internasional" {{ $tracer->f5d_tingkat_instansi == 'Internasional' ? 'selected' : '' }}>Internasional / Multinasional</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">11. Hubungan Bidang Studi dengan Pekerjaan</label>
                        <select name="f14_hubungan_studi" class="form-select">
                            <option value="1" {{ $tracer->f14_hubungan_studi == 1 ? 'selected' : '' }}>Sangat Erat</option>
                            <option value="2" {{ $tracer->f14_hubungan_studi == 2 ? 'selected' : '' }}>Erat</option>
                            <option value="3" {{ $tracer->f14_hubungan_studi == 3 ? 'selected' : '' }}>Cukup Erat</option>
                            <option value="4" {{ $tracer->f14_hubungan_studi == 4 ? 'selected' : '' }}>Kurang Erat</option>
                            <option value="5" {{ $tracer->f14_hubungan_studi == 5 ? 'selected' : '' }}>Tidak Sama Sekali</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- BUTTONS -->
        <div class="d-flex justify-content-between mb-5">
            <a href="{{ route('tracer-alumni.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left me-1"></i> Batal / Kembali
            </a>
            <button type="submit" class="btn btn-success px-4">
                <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan Data
            </button>
        </div>
    </form>
</div>
@endsection