<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Alumni</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
            margin: 24px;
        }

        .kop-surat {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 24px;
        }

        .kop-surat h1 {
            font-size: 20px;
            margin: 0 0 6px;
        }

        .kop-surat p {
            margin: 2px 0;
            font-size: 11px;
        }

        h2 {
            text-align: center;
            font-size: 17px;
            margin: 0 0 18px;
        }

        h3 {
            font-size: 14px;
            margin: 18px 0 8px;
            padding: 6px 8px;
            background: #f0f0f0;
            border: 1px solid #d0d0d0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 7px 8px;
            vertical-align: top;
        }

        th {
            width: 32%;
            text-align: left;
            background: #f7f7f7;
        }

        .status {
            border: 1px solid #198754;
            background: #e8f7ee;
            color: #0f5132;
            padding: 10px;
            margin-bottom: 16px;
            text-align: center;
            font-weight: bold;
        }

        .photo {
            width: 120px;
            height: auto;
            border: 1px solid #aaa;
            padding: 4px;
            margin-bottom: 12px;
        }

        .footer {
            margin-top: 22px;
            font-size: 11px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        <h1>UNIVERSITAS METHODIST INDONESIA</h1>
        <p>Alamat: Jl. Hang Tuah No.8, Madras Hulu, Kec. Medan Polonia, Kota Medan, Sumatera Utara 20151</p>
        <p>Telepon: 0614157882 | Email: https://www.methodist.ac.id</p>
    </div>

    <h2>Data Alumni Terverifikasi</h2>

    @forelse ($data as $item)
        <div class="status">
            Dokumen valid dan data alumni telah terverifikasi.
        </div>

        @if (!empty($item->file))
            <img class="photo" src="{{ public_path('images/alumni/' . $item->file) }}" alt="Foto Alumni">
        @endif

        <h3>Profile</h3>
        <table>
            <tbody>
                <tr>
                    <th>NIK</th>
                    <td>{{ $item->nik ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $item->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td>{{ $item->tempat_lhr ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ $item->tanggal_lhr ? \Carbon\Carbon::parse($item->tanggal_lhr)->translatedFormat('d F Y') : '-' }}</td>
                </tr>
                <tr>
                    <th>Nama Ayah</th>
                    <td>{{ $item->ayah ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Nama Ibu</th>
                    <td>{{ $item->ibu ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <td>{{ $item->provinsi ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kota/Kabupaten</th>
                    <td>{{ $item->kota ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <td>{{ $item->kecamatan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kelurahan</th>
                    <td>{{ $item->kelurahan ?? '-' }}</td>
                </tr>
            </tbody>
        </table>

        <h3>History Perkuliahan</h3>
        <table>
            <tbody>
                <tr>
                    <th>No Alumni</th>
                    <td>{{ $item->no_alumni ?? '-' }}</td>
                </tr>
                <tr>
                    <th>NPM</th>
                    <td>{{ $item->npm ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Program Studi</th>
                    <td>{{ $item->prodis->prodi ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Peminatan</th>
                    <td>{{ $item->minat->peminatan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Fakultas</th>
                    <td>{{ $item->fakultas ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Stambuk</th>
                    <td>{{ $item->stambuk ?? '-' }}</td>
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
                    <td>{{ $item->judul ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Dosen Pembimbing 1</th>
                    <td>{{ $item->dosenpembimbing1->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Dosen Pembimbing 2</th>
                    <td>{{ $item->dosenpembimbing2->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Dosen Penguji 1</th>
                    <td>{{ $item->dosenpenguji1->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Dosen Penguji 2</th>
                    <td>{{ $item->dosenpenguji2->nama ?? '-' }}</td>
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

        <div class="footer">
            Dicetak pada {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}
        </div>
    @empty
        <div class="status">
            Data tidak ditemukan atau belum diverifikasi.
        </div>
    @endforelse
</body>

</html>