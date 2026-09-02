@extends('Partials.Person')

@section('title', 'Form Kuesioner Tracer Study')

@section('content')
<div class="container-xl my-4">
    <div class="page-header d-print-none mb-4">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title text-primary">
                    <i class="fa-solid fa-clipboard-question me-2"></i> Kuesioner Tracer Study Universitas Methodist Indonesia
                </h2>
                <p class="text-secondary mb-0">
                    Mohon diisi dengan sebenar-benarnya untuk kepentingan evaluasi & peningkatan akreditasi institusi.
                </p>
            </div>
        </div>
    </div>

    @if(isset($tracer) && $tracer->status_approval == 1)
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <i class="fa-solid fa-circle-check fs-2 me-3"></i>
            <div>
                <h4 class="alert-title mb-1">Kuesioner Anda Telah Disetujui (Approved)</h4>
                <p class="mb-0 text-secondary">Data Tracer Study & Jejak Karir Anda telah diverifikasi oleh Admin dan dipublikasikan.</p>
            </div>
        </div>
    @elseif(isset($tracer) && $tracer->status_approval == 0)
        <div class="alert alert-warning d-flex align-items-center mb-4" role="alert">
            <i class="fa-solid fa-clock fs-2 me-3"></i>
            <div>
                <h4 class="alert-title mb-1">Status Pengisian: Menunggu Verifikasi Admin (Pending)</h4>
                <p class="mb-0 text-secondary">Anda masih dapat memperbarui atau memperbaiki jawaban kuesioner Anda di bawah ini sebelum disetujui Admin.</p>
            </div>
        </div>
    @endif

    <form action="{{ route('user.tracer.store') }}" method="POST">
        @csrf

        <!-- SECTION: IDENTITAS ALUMNI -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title text-white"><i class="fa-solid fa-id-card me-2"></i> Identitas Alumni</h3>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Perguruan Tinggi</label>
                        <input type="text" class="form-control bg-light" value="Universitas Methodist Indonesia" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NPM / NIM</label>
                        <input type="text" class="form-control bg-light" value="{{ $alumni->npm }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control bg-light" value="{{ $alumni->nama }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Fakultas</label>
                        <input type="text" class="form-control bg-light" value="{{ $alumni->fakultas }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Program Studi</label>
                        <input type="text" class="form-control bg-light" value="{{ $alumni->prodis->prodi ?? '-' }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Peminatan</label>
                        <input type="text" class="form-control bg-light" value="{{ $alumni->minat->peminatan ?? '-' }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">NIK (Opsional)</label>
                        <input type="text" name="nik" class="form-control" value="{{ old('nik', $tracer->nik ?? $alumni->nik) }}" placeholder="Nomor Induk Kependudukan">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">NPWP (Opsional)</label>
                        <input type="text" name="npwp" class="form-control" value="{{ old('npwp', $tracer->npwp ?? '') }}" placeholder="Nomor NPWP">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nomor HP / Whatsapp (Opsional)</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $tracer->no_hp ?? '') }}" placeholder="08xxxxxxxxxx">
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 1: STATUS UTAMA (SOAL NO 1) -->
        <div class="card mb-4 shadow-sm border-primary">
            <div class="card-header bg-primary-lt">
                <h3 class="card-title text-primary"><i class="fa-solid fa-user-doctor me-2"></i> 1. Jelaskan Status Anda Saat Ini? <span class="text-danger">*</span></h3>
            </div>
            <div class="card-body">
                @php $status_f8 = old('f8_status', $tracer->f8_status ?? ''); @endphp
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column gap-2">
                    <label class="form-selectgroup-item">
                        <input type="radio" name="f8_status" value="1" class="form-selectgroup-input status-radio" {{ $status_f8 == 1 ? 'checked' : '' }} required>
                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                            <span class="me-3"><span class="form-selectgroup-check"></span></span>
                            <span class="form-selectgroup-title">Bekerja (Full Time / Part Time)</span>
                        </span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="radio" name="f8_status" value="3" class="form-selectgroup-input status-radio" {{ $status_f8 == 3 ? 'checked' : '' }}>
                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                            <span class="me-3"><span class="form-selectgroup-check"></span></span>
                            <span class="form-selectgroup-title">Wiraswasta / Pemilik Usaha</span>
                        </span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="radio" name="f8_status" value="4" class="form-selectgroup-input status-radio" {{ $status_f8 == 4 ? 'checked' : '' }}>
                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                            <span class="me-3"><span class="form-selectgroup-check"></span></span>
                            <span class="form-selectgroup-title">Melanjutkan Pendidikan</span>
                        </span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="radio" name="f8_status" value="5" class="form-selectgroup-input status-radio" {{ $status_f8 == 5 ? 'checked' : '' }}>
                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                            <span class="me-3"><span class="form-selectgroup-check"></span></span>
                            <span class="form-selectgroup-title">Tidak Kerja Tetapi Sedang Mencari Kerja</span>
                        </span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="radio" name="f8_status" value="2" class="form-selectgroup-input status-radio" {{ $status_f8 == 2 ? 'checked' : '' }}>
                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                            <span class="me-3"><span class="form-selectgroup-check"></span></span>
                            <span class="form-selectgroup-title">Belum Memungkinkan Bekerja (Menikah, Mengurus Keluarga, dll)</span>
                        </span>
                    </label>
                </div>
            </div>
        </div>

        <!-- SECTION: PERTANYAAN BEKERJA / WIRASWASTA (SOAL 2 - 8, 11, 12) -->
        <div id="section-kerja" class="card mb-4 shadow-sm" style="display: none;">
            <div class="card-header bg-info-lt">
                <h3 class="card-title text-info"><i class="fa-solid fa-briefcase me-2"></i> Informasi Bekerja & Wiraswasta</h3>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">2. Berapa bulan sebelum/setelah lulus Anda memperoleh pekerjaan / wiraswasta pertama?</label>
                        <div class="input-group">
                            <input type="number" name="f502_bulan_cari_kerja" class="form-control" value="{{ old('f502_bulan_cari_kerja', $tracer->f502_bulan_cari_kerja ?? '') }}" placeholder="Contoh: 3">
                            <span class="input-group-text">Bulan</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3. Rata-rata pendapatan per bulan (Take Home Pay)?</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="f505_gaji" class="form-control" value="{{ old('f505_gaji', $tracer->f505_gaji ?? '') }}" placeholder="Contoh: 4500000">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4a. Provinsi Tempat Kerja</label>
                        <input type="text" name="f5a1_provinsi" class="form-control" value="{{ old('f5a1_provinsi', $tracer->f5a1_provinsi ?? '') }}" placeholder="Masukkan Provinsi">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">4b. Kota / Kabupaten Tempat Kerja</label>
                        <input type="text" name="f5a2_kabupaten" class="form-control" value="{{ old('f5a2_kabupaten', $tracer->f5a2_kabupaten ?? '') }}" placeholder="Masukkan Kota/Kabupaten">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">5. Jenis Perusahaan / Instansi Tempat Bekerja</label>
                        <select name="f1101_jenis_instansi" class="form-select">
                            <option value="">-- Pilih Jenis Instansi --</option>
                            <option value="1" {{ old('f1101_jenis_instansi', $tracer->f1101_jenis_instansi ?? '') == 1 ? 'selected' : '' }}>Instansi Pemerintah (Termasuk BUMN/BUMD)</option>
                            <option value="2" {{ old('f1101_jenis_instansi', $tracer->f1101_jenis_instansi ?? '') == 2 ? 'selected' : '' }}>Organisasi Non-profit / Lembaga Swadaya Masyarakat</option>
                            <option value="3" {{ old('f1101_jenis_instansi', $tracer->f1101_jenis_instansi ?? '') == 3 ? 'selected' : '' }}>Perusahaan Swasta</option>
                            <option value="4" {{ old('f1101_jenis_instansi', $tracer->f1101_jenis_instansi ?? '') == 4 ? 'selected' : '' }}>Wiraswasta / Perusahaan Sendiri</option>
                            <option value="5" {{ old('f1101_jenis_instansi', $tracer->f1101_jenis_instansi ?? '') == 5 ? 'selected' : '' }}>BUMN/BUMD</option>
                            <option value="6" {{ old('f1101_jenis_instansi', $tracer->f1101_jenis_instansi ?? '') == 6 ? 'selected' : '' }}>Institusi/Organisasi Multilateral</option>
                            <option value="7" {{ old('f1101_jenis_instansi', $tracer->f1101_jenis_instansi ?? '') == 7 ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">6. Nama Perusahaan / Kantor Tempat Bekerja</label>
                        <input type="text" name="f5c_nama_instansi" class="form-control" value="{{ old('f5c_nama_instansi', $tracer->f5c_nama_instansi ?? '') }}" placeholder="Contoh: PT. Bank Mandiri">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">8. Tingkat Tempat Kerja / Tingkat Instansi</label>
                        <select name="f5d_tingkat_instansi" class="form-select">
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="Lokal/Wilayah" {{ old('f5d_tingkat_instansi', $tracer->f5d_tingkat_instansi ?? '') == 'Lokal/Wilayah' ? 'selected' : '' }}>Lokal / Wilayah / Berizin Lokal</option>
                            <option value="Nasional" {{ old('f5d_tingkat_instansi', $tracer->f5d_tingkat_instansi ?? '') == 'Nasional' ? 'selected' : '' }}>Nasional / Berizin Nasional</option>
                            <option value="Internasional" {{ old('f5d_tingkat_instansi', $tracer->f5d_tingkat_instansi ?? '') == 'Internasional' ? 'selected' : '' }}>Internasional / Multinasional</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">11. Seberapa erat hubungan bidang studi dengan pekerjaan Anda?</label>
                        <select name="f14_hubungan_studi" class="form-select">
                            <option value="">-- Pilih Erat/Tidak --</option>
                            <option value="1" {{ old('f14_hubungan_studi', $tracer->f14_hubungan_studi ?? '') == 1 ? 'selected' : '' }}>Sangat Erat</option>
                            <option value="2" {{ old('f14_hubungan_studi', $tracer->f14_hubungan_studi ?? '') == 2 ? 'selected' : '' }}>Erat</option>
                            <option value="3" {{ old('f14_hubungan_studi', $tracer->f14_hubungan_studi ?? '') == 3 ? 'selected' : '' }}>Cukup Erat</option>
                            <option value="4" {{ old('f14_hubungan_studi', $tracer->f14_hubungan_studi ?? '') == 4 ? 'selected' : '' }}>Kurang Erat</option>
                            <option value="5" {{ old('f14_hubungan_studi', $tracer->f14_hubungan_studi ?? '') == 5 ? 'selected' : '' }}>Tidak Sama Sekali</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">12. Tingkat pendidikan apa yang paling sesuai untuk pekerjaan Anda saat ini?</label>
                        <select name="f15_pendidikan_sesuai" class="form-select">
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="1" {{ old('f15_pendidikan_sesuai', $tracer->f15_pendidikan_sesuai ?? '') == 1 ? 'selected' : '' }}>Setingkat Lebih Tinggi</option>
                            <option value="2" {{ old('f15_pendidikan_sesuai', $tracer->f15_pendidikan_sesuai ?? '') == 2 ? 'selected' : '' }}>Tingkat yang Sama</option>
                            <option value="3" {{ old('f15_pendidikan_sesuai', $tracer->f15_pendidikan_sesuai ?? '') == 3 ? 'selected' : '' }}>Setingkat Lebih Rendah</option>
                            <option value="4" {{ old('f15_pendidikan_sesuai', $tracer->f15_pendidikan_sesuai ?? '') == 4 ? 'selected' : '' }}>Tidak Perlu Pendidikan Tinggi</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION: MELANJUTKAN PENDIDIKAN (SOAL 9 & 10) -->
        <div id="section-studi" class="card mb-4 shadow-sm" style="display: none;">
            <div class="card-header bg-warning-lt">
                <h3 class="card-title text-warning"><i class="fa-solid fa-graduation-cap me-2"></i> Informasi Melanjutkan Pendidikan</h3>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">9a. Nama Perguruan Tinggi</label>
                        <input type="text" name="f18b_perguruan_tinggi" class="form-control" value="{{ old('f18b_perguruan_tinggi', $tracer->f18b_perguruan_tinggi ?? '') }}" placeholder="Contoh: Universitas Indonesia">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">9b. Program Studi</label>
                        <input type="text" name="f18c_prodi" class="form-control" value="{{ old('f18c_prodi', $tracer->f18c_prodi ?? '') }}" placeholder="Contoh: Magister Teknik Informatika">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">9c. Tanggal Masuk Studi Lanjut</label>
                        <input type="date" name="f18d_tanggal_masuk" class="form-control" value="{{ old('f18d_tanggal_masuk', $tracer->f18d_tanggal_masuk ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">10. Sumber Pembiayaan Kuliah</label>
                        <select name="f1201_sumber_dana" class="form-select">
                            <option value="">-- Pilih Sumber Biaya --</option>
                            <option value="1" {{ old('f1201_sumber_dana', $tracer->f1201_sumber_dana ?? '') == 1 ? 'selected' : '' }}>Biaya Sendiri / Keluarga</option>
                            <option value="2" {{ old('f1201_sumber_dana', $tracer->f1201_sumber_dana ?? '') == 2 ? 'selected' : '' }}>Beasiswa ADIK</option>
                            <option value="3" {{ old('f1201_sumber_dana', $tracer->f1201_sumber_dana ?? '') == 3 ? 'selected' : '' }}>Beasiswa BIDIKMISI / KIP-K</option>
                            <option value="4" {{ old('f1201_sumber_dana', $tracer->f1201_sumber_dana ?? '') == 4 ? 'selected' : '' }}>Beasiswa PPA</option>
                            <option value="5" {{ old('f1201_sumber_dana', $tracer->f1201_sumber_dana ?? '') == 5 ? 'selected' : '' }}>Beasiswa AFIRMASI</option>
                            <option value="6" {{ old('f1201_sumber_dana', $tracer->f1201_sumber_dana ?? '') == 6 ? 'selected' : '' }}>Beasiswa Perusahaan / Swasta</option>
                            <option value="7" {{ old('f1201_sumber_dana', $tracer->f1201_sumber_dana ?? '') == 7 ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION: PROSES MENCARI KERJA (SOAL 15 - 20) -->
        <div id="section-pencarian-kerja" class="card mb-4 shadow-sm" style="display: none;">
            <div class="card-header bg-success-lt">
                <h3 class="card-title text-success"><i class="fa-solid fa-magnifying-glass me-2"></i> Proses Mencari Pekerjaan</h3>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">15. Kapan Anda mulai mencari pekerjaan?</label>
                        <select name="f301_waktu_cari_kerja" class="form-select">
                            <option value="">-- Pilih --</option>
                            <option value="1" {{ old('f301_waktu_cari_kerja', $tracer->f301_waktu_cari_kerja ?? '') == 1 ? 'selected' : '' }}>Sebelum Lulus</option>
                            <option value="2" {{ old('f301_waktu_cari_kerja', $tracer->f301_waktu_cari_kerja ?? '') == 2 ? 'selected' : '' }}>Sesudah Lulus</option>
                            <option value="3" {{ old('f301_waktu_cari_kerja', $tracer->f301_waktu_cari_kerja ?? '') == 3 ? 'selected' : '' }}>Saya Tidak Mencari Kerja</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">17. Berapa instansi yang Anda lamar?</label>
                        <input type="number" name="f6_jumlah_dilamar" class="form-control" value="{{ old('f6_jumlah_dilamar', $tracer->f6_jumlah_dilamar ?? '') }}" placeholder="0">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">18. Berapa instansi yang merespons?</label>
                        <input type="number" name="f7_jumlah_respon" class="form-control" value="{{ old('f7_jumlah_respon', $tracer->f7_jumlah_respon ?? '') }}" placeholder="0">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">19. Berapa instansi mengundang wawancara?</label>
                        <input type="number" name="f7a_jumlah_wawancara" class="form-control" value="{{ old('f7a_jumlah_wawancara', $tracer->f7a_jumlah_wawancara ?? '') }}" placeholder="0">
                    </div>

                    <div id="section-soal20" class="col-md-12 mt-3" style="display: none;">
                        <label class="form-label">20. Apakah Anda aktif mencari pekerjaan dalam 4 minggu terakhir?</label>
                        <select name="f1001_aktif_cari_kerja" class="form-select">
                            <option value="">-- Pilih --</option>
                            <option value="1" {{ old('f1001_aktif_cari_kerja', $tracer->f1001_aktif_cari_kerja ?? '') == 1 ? 'selected' : '' }}>Tidak</option>
                            <option value="2" {{ old('f1001_aktif_cari_kerja', $tracer->f1001_aktif_cari_kerja ?? '') == 2 ? 'selected' : '' }}>Tidak, tapi sedang menunggu hasil lamaran</option>
                            <option value="3" {{ old('f1001_aktif_cari_kerja', $tracer->f1001_aktif_cari_kerja ?? '') == 3 ? 'selected' : '' }}>Ya, saya akan mulai bekerja dalam 2 minggu ke depan</option>
                            <option value="4" {{ old('f1001_aktif_cari_kerja', $tracer->f1001_aktif_cari_kerja ?? '') == 4 ? 'selected' : '' }}>Ya, tapi belum pasti bekerja dalam 2 minggu ke depan</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION: UNIVERSAL MATRIX SOAL NO 13 (KOMPETENSI) -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-dark text-white">
                <h3 class="card-title text-white"><i class="fa-solid fa-chart-line me-2"></i> 13. Matriks Evaluasi Kompetensi</h3>
            </div>
            <div class="card-body">
                <p class="text-secondary small">
                    Berikan penilaian tingkat kompetensi Anda pada: <strong>(A) Saat Lulus</strong> dan <strong>(B) Diperlukan Dalam Pekerjaan</strong> (Skala 1 = Sangat Rendah s/d 5 = Sangat Tinggi).
                </p>
                
                @php 
                    $kompetensi_data = $tracer->f17_kompetensi ?? [];
                    $aspek_list = [
                        'f1761_f1762' => 'Etika',
                        'f1763_f1764' => 'Keahlian Berdasarkan Bidang Ilmu (Main Discipline)',
                        'f1765_f1766' => 'Bahasa Inggris',
                        'f1767_f1768' => 'Penggunaan Teknologi Informasi (IT)',
                        'f1769_f1770' => 'Komunikasi',
                        'f1771_f1772' => 'Kerjasama Tim (Teamwork)',
                        'f1773_f1774' => 'Pengembangan Diri (Self Development)',
                    ];
                @endphp

                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="bg-light">
                            <tr>
                                <th rowspan="2" class="text-start">Aspek / Jenis Kompetensi</th>
                                <th colspan="5">(A) Pada Saat Lulus</th>
                                <th colspan="5">(B) Diperlukan Pekerjaan Saat Ini</th>
                            </tr>
                            <tr>
                                <th>1</th><th>2</th><th>3</th><th>4</th><th>5</th>
                                <th>1</th><th>2</th><th>3</th><th>4</th><th>5</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aspek_list as $key => $label)
                                <tr>
                                    <td class="text-start fw-bold">{{ $label }}</td>
                                    <!-- A: Saat Lulus -->
                                    @for($i = 1; $i <= 5; $i++)
                                        <td>
                                            <input type="radio" name="f17[{{ $key }}][A]" value="{{ $i }}" {{ ($kompetensi_data[$key]['A'] ?? '') == $i ? 'checked' : '' }} required>
                                        </td>
                                    @endfor
                                    <!-- B: Diperlukan Pekerjaan -->
                                    @for($i = 1; $i <= 5; $i++)
                                        <td>
                                            <input type="radio" name="f17[{{ $key }}][B]" value="{{ $i }}" {{ ($kompetensi_data[$key]['B'] ?? '') == $i ? 'checked' : '' }} required>
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- SECTION: UNIVERSAL MATRIX SOAL NO 14 (METODE PEMBELAJARAN) -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-dark text-white">
                <h3 class="card-title text-white"><i class="fa-solid fa-book-open me-2"></i> 14. Penekanan Metode Pembelajaran di Prodi</h3>
            </div>
            <div class="card-body">
                <p class="text-secondary small">
                    Seberapa besar penekanan metode pembelajaran di bawah ini yang dilaksanakan pada program studi Anda? (Skala 1 = Sangat Besar s/d 5 = Tidak Sama Sekali).
                </p>

                @php
                    $metode_data = $tracer->f21_metode_pembelajaran ?? [];
                    $metode_list = [
                        'f21' => 'Perkuliahan',
                        'f22' => 'Demonstrasi',
                        'f23' => 'Partisipasi Dalam Proyek Riset',
                        'f24' => 'Magang / Internship',
                        'f25' => 'Praktikum',
                        'f26' => 'Kerja Lapangan',
                        'f27' => 'Diskusi',
                    ];
                @endphp

                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-start">Metode Pembelajaran</th>
                                <th>1 (Sangat Besar)</th>
                                <th>2 (Besar)</th>
                                <th>3 (Cukup Besar)</th>
                                <th>4 (Kurang Besar)</th>
                                <th>5 (Tidak Sama Sekali)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($metode_list as $key => $label)
                                <tr>
                                    <td class="text-start fw-bold">{{ $label }}</td>
                                    @for($i = 1; $i <= 5; $i++)
                                        <td>
                                            <input type="radio" name="f21_metode[{{ $key }}]" value="{{ $i }}" {{ ($metode_data[$key] ?? '') == $i ? 'checked' : '' }} required>
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- BUTTON SUBMIT -->
        <div class="d-flex justify-content-end mb-5">
            <button type="submit" class="btn btn-primary btn-lg px-5 shadow">
                <i class="fa-solid fa-paper-plane me-2"></i> Simpan & Kirim Kuesioner
            </button>
        </div>
    </form>
</div>
@endsection

@push('script')
<script>
$(document).ready(function() {
    function toggleSections() {
        var status = $('input[name="f8_status"]:checked').val();

        // Hide all conditional sections first
        $('#section-kerja').hide();
        $('#section-studi').hide();
        $('#section-pencarian-kerja').hide();
        $('#section-soal20').hide();

        // 1 = Bekerja, 3 = Wiraswasta
        if (status == 1 || status == 3) {
            $('#section-kerja').slideDown();
            $('#section-pencarian-kerja').slideDown();
        } 
        // 4 = Melanjutkan Pendidikan
        else if (status == 4) {
            $('#section-studi').slideDown();
        } 
        // 5 = Tidak Kerja Tapi Mencari Kerja
        else if (status == 5) {
            $('#section-pencarian-kerja').slideDown();
            $('#section-soal20').slideDown();
        }
    }

    // Run on initial page load
    toggleSections();

    // Run on change of status radio
    $('.status-radio').change(function() {
        toggleSections();
    });
});
</script>
@endpush