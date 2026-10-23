<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Daftar Wisudawan</title>
    <style>
        @page {
            margin: 35px 35px 45px 35px;
            size: a4 portrait;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #111;
            margin: 0;
            padding: 0;
            font-size: 8.5pt;
        }

        .watermark {
            position: fixed;
            top: 25%;
            left: 15%;
            width: 70%;
            text-align: center;
            opacity: 0.08;
            z-index: -1000;
        }

        .watermark img {
            width: 340px;
            height: auto;
        }

        .footer {
            position: fixed;
            bottom: -25px;
            left: 0;
            right: 0;
            height: 18px;
            border-top: 1px solid #777;
            padding-top: 4px;
        }

        .footer table {
            width: 100%;
            border-collapse: collapse;
        }

        .footer td {
            font-size: 7.5pt;
            color: #444;
            font-style: italic;
            padding: 0;
        }

        .page-container {
            page-break-after: always;
            clear: both;
        }

        .page-container:last-child {
            page-break-after: avoid;
        }

        .header-title {
            font-size: 10.5pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding-bottom: 5px;
            margin-bottom: 14px;
            border-bottom: 1.5px solid #000;
        }

        .alumni-card {
            width: 100%;
            margin-bottom: 10px;
            page-break-inside: avoid;
        }

        .alumni-card table.main-table {
            width: 100%;
            border-collapse: collapse;
        }

        .photo-cell {
            width: 95px;
            vertical-align: top;
            text-align: center;
            padding-right: 12px;
        }

        .photo-frame {
            width: 88px;
            height: 115px;
            border: 1px solid #555;
            background-color: #f2f2f2;
            margin: 0 auto;
            text-align: center;
            line-height: 115px;
            overflow: hidden;
        }

        .photo-frame img {
            width: 88px;
            height: 115px;
            display: block;
        }

        .photo-number {
            font-size: 9pt;
            font-weight: bold;
            margin-top: 4px;
            text-align: center;
            color: #000;
        }

        .info-cell {
            vertical-align: top;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table tr td {
            padding: 1.5px 0;
            font-size: 8.5pt;
            vertical-align: top;
            line-height: 1.25;
        }

        .info-label {
            width: 130px;
            color: #111;
            white-space: nowrap;
        }

        .info-sep {
            width: 14px;
            text-align: left;
            color: #111;
        }

        .info-val {
            color: #000;
            word-wrap: break-word;
        }

        .empty-message {
            text-align: center;
            padding: 50px 20px;
            font-size: 11pt;
            color: #666;
        }
    </style>
</head>
<body>

    @php
        $logoPath = public_path('img/logo.png');
        $logoBase64 = '';
        if (file_exists($logoPath)) {
            $logoBase64 = base64_encode(file_get_contents($logoPath));
        }

        $globalCounter = 1;
    @endphp

    @if ($logoBase64)
        <div class="watermark">
            <img src="data:image/png;base64,{{ $logoBase64 }}" alt="Logo UMI">
        </div>
    @endif

    <div class="footer">
        <table>
            <tr>
                <td style="text-align: left;">
                    Wisuda Sarjana, Profesi Dokter dan Diploma III Universitas Methodist Indonesia {{ $periode ? $periode . ' ' : '' }}{{ $tahun ? 'Tahun ' . $tahun : '' }}
                </td>
                <td style="text-align: right; width: 60px;">
                    {{-- Page number filled by Dompdf script --}}
                </td>
            </tr>
        </table>
    </div>

    @if ($alumni->isEmpty())
        <div class="page-container">
            <div class="header-title">
                FAKULTAS {{ strtoupper($fakultas ?: 'METHODIST') }}
            </div>
            <div class="empty-message">
                <p>Tidak ada data wisudawan untuk kriteria yang dipilih.</p>
                <p><strong>Fakultas:</strong> {{ $fakultas ?: 'Semua' }} | <strong>Periode:</strong> {{ $periode ?: 'Semua' }} | <strong>Tahun:</strong> {{ $tahun ?: '-' }}</p>
            </div>
        </div>
    @else
        @php
            $prodiGroups = $alumni->groupBy(function($item) {
                return $item->prodis->prodi ?? ($item->prodi ?: 'UMUM');
            });
        @endphp

        @foreach ($prodiGroups as $prodiName => $items)
            @php
                $chunks = $items->chunk(4);
            @endphp

            @foreach ($chunks as $chunk)
                <div class="page-container">
                    <div class="header-title">
                        FAKULTAS {{ strtoupper($fakultas ?: ($chunk->first()->fakultas ?? 'METHODIST')) }}, PRODI {{ strtoupper($prodiName) }}
                    </div>

                    @foreach ($chunk as $item)
                        @php
                            // Check Photo
                            $photoSrc = null;
                            if ($item->file) {
                                $filePath = public_path('images/alumni/' . $item->file);
                                if (file_exists($filePath) && is_file($filePath)) {
                                    $photoData = base64_encode(file_get_contents($filePath));
                                    $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
                                    $mime = $ext == 'png' ? 'image/png' : 'image/jpeg';
                                    $photoSrc = 'data:' . $mime . ';base64,' . $photoData;
                                }
                            }

                            // Address formatting
                            $addressParts = array_filter([
                                $item->kelurahan,
                                $item->kecamatan,
                                $item->kota,
                                $item->provinsi,
                            ]);
                            $alamatStr = count($addressParts) > 0 ? implode(', ', $addressParts) : '-';

                            // Parent names
                            $orangTua = '-';
                            if ($item->ayah && $item->ibu) {
                                $orangTua = $item->ayah . '/' . $item->ibu;
                            } elseif ($item->ayah) {
                                $orangTua = $item->ayah;
                            } elseif ($item->ibu) {
                                $orangTua = $item->ibu;
                            }

                            // Dates
                            $tglLahirStr = '-';
                            if ($item->tanggal_lhr) {
                                $parsedLhr = \Carbon\Carbon::parse($item->tanggal_lhr)->locale('id')->translatedFormat('d F Y');
                                $tglLahirStr = ($item->tempat_lhr ? $item->tempat_lhr . ', ' : '') . $parsedLhr;
                            } elseif ($item->tempat_lhr) {
                                $tglLahirStr = $item->tempat_lhr;
                            }

                            $tglLulusStr = $item->yudisium 
                                ? \Carbon\Carbon::parse($item->yudisium)->locale('id')->translatedFormat('d F Y')
                                : ($item->thn_lulus ?? '-');
                        @endphp

                        <div class="alumni-card">
                            <table class="main-table">
                                <tr>
                                    <td class="photo-cell">
                                        <div class="photo-frame">
                                            @if ($photoSrc)
                                                <img src="{{ $photoSrc }}" alt="Foto">
                                            @else
                                                <span style="font-size: 7.5pt; color: #888;">Foto 3x4</span>
                                            @endif
                                        </div>
                                        <div class="photo-number">{{ sprintf('%02d', $globalCounter++) }}</div>
                                    </td>
                                    <td class="info-cell">
                                        <table class="info-table">
                                            <tr>
                                                <td class="info-label">No. Alumni</td>
                                                <td class="info-sep">:</td>
                                                <td class="info-val">{{ $item->no_alumni ?: '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="info-label">NPM</td>
                                                <td class="info-sep">:</td>
                                                <td class="info-val">{{ $item->npm ?: '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="info-label">Nama</td>
                                                <td class="info-sep">:</td>
                                                <td class="info-val"><strong>{{ $item->nama ?: '-' }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="info-label">Tempat / Tgl. Lahir</td>
                                                <td class="info-sep">:</td>
                                                <td class="info-val">{{ $tglLahirStr }}</td>
                                            </tr>
                                            <tr>
                                                <td class="info-label">Alamat</td>
                                                <td class="info-sep">:</td>
                                                <td class="info-val">{{ $alamatStr }}</td>
                                            </tr>
                                            <tr>
                                                <td class="info-label">Tanggal Lulus</td>
                                                <td class="info-sep">:</td>
                                                <td class="info-val">{{ $tglLulusStr }}</td>
                                            </tr>
                                            <tr>
                                                <td class="info-label">IPK</td>
                                                <td class="info-sep">:</td>
                                                <td class="info-val">{{ $item->ipk ? str_replace('.', ',', $item->ipk) : '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="info-label">Nama Orang Tua</td>
                                                <td class="info-sep">:</td>
                                                <td class="info-val">{{ $orangTua }}</td>
                                            </tr>
                                            <tr>
                                                <td class="info-label">Judul Skripsi</td>
                                                <td class="info-sep">:</td>
                                                <td class="info-val">{{ $item->judul ?: '-' }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endforeach
    @endif

    <script type="text/php">
        if (isset($pdf)) {
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $size = 8;
            $color = array(0.25, 0.25, 0.25);
            $pdf->page_text($pdf->get_width() - 55, $pdf->get_height() - 31, "{PAGE_NUM}", $font, $size, $color);
        }
    </script>
</body>
</html>
