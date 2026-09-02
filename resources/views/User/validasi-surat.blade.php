@extends('Partials.Person')

@section('title', 'Validasi Surat')

@section('content')
    <div class="container-xl d-flex flex-column justify-content-center">
        <div class="alert alert-success">
            <strong>Dokumen Valid.</strong> Surat keterangan ini terverifikasi oleh sistem.
        </div>

        @forelse ($data as $item)
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                        <li class="nav-item">
                            <a href="#tabs-home-3" class="nav-link active" data-bs-toggle="tab">
                                <i class="fa-regular fa-user me-2"></i>
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-profile-3" class="nav-link" data-bs-toggle="tab">
                                <i class="fa-solid fa-user-graduate me-2"></i>
                                History Perkuliahan
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-home-3">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 text-center mb-3">
                                    <img src="{{ asset('images/alumni/' . $item->file) }}" alt="Alumni Photo"
                                        class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                </div>

                                <div class="col-md-8 col-sm-12">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>NIK</th>
                                                <td>{{ $item->nik }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td>{{ $item->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tempat Lahir</th>
                                                <td>{{ $item->tempat_lhr }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td>{{ \Carbon\Carbon::parse($item->tanggal_lhr)->translatedFormat('d F Y') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Ayah</th>
                                                <td>{{ $item->ayah }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Ibu</th>
                                                <td>{{ $item->ibu }}</td>
                                            </tr>
                                            <tr>
                                                <th>Provinsi</th>
                                                <td>{{ $item->provinsi }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kota/Kabupaten</th>
                                                <td>{{ $item->kota }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $item->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kelurahan</th>
                                                <td>{{ $item->kelurahan }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tabs-profile-3">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>No Alumni</th>
                                        <td>{{ $item->no_alumni }}</td>
                                    </tr>
                                    <tr>
                                        <th>NPM</th>
                                        <td>{{ $item->npm }}</td>
                                    </tr>
                                    <tr>
                                        <th>Program Studi</th>
                                        <td>{{ $item->prodis->prodi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Peminatan</th>
                                        <td>{{ $item->minat->peminatan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fakultas</th>
                                        <td>{{ $item->fakultas }}</td>
                                    </tr>
                                    <tr>
                                        <th>Stambuk</th>
                                        <td>{{ $item->stambuk }}</td>
                                    </tr>
                                    <tr>
                                        <th>Seminar Proposal</th>
                                        <td>{{ $item->sempro ? \Carbon\Carbon::parse($item->sempro)->translatedFormat('d F Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Seminar Hasil</th>
                                        <td>{{ $item->semhas ? \Carbon\Carbon::parse($item->semhas)->translatedFormat('d F Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sidang Meja Hijau</th>
                                        <td>{{ $item->mejahijau ? \Carbon\Carbon::parse($item->mejahijau)->translatedFormat('d F Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Yudisium</th>
                                        <td>{{ $item->yudisium ? \Carbon\Carbon::parse($item->yudisium)->translatedFormat('d F Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Judul Skripsi</th>
                                        <td>{{ $item->judul }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dosen Pembimbing 1</th>
                                        <td>{{ $item->dosenpembimbing1->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dosen Pembimbing 2</th>
                                        <td>{{ $item->dosenpembimbing2->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dosen Penguji 1</th>
                                        <td>{{ $item->dosenpenguji1->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dosen Penguji 2</th>
                                        <td>{{ $item->dosenpenguji2->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>IPK</th>
                                        <td>{{ $item->ipk ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Lulus</th>
                                        <td>{{ $item->thn_lulus ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                Data tidak ditemukan atau belum diverifikasi.
            </div>
        @endforelse
    </div>
@endsection