<?php

namespace App\Http\Controllers;

use App\Exports\AlumniExport;
use App\Exports\bukuExport;
use App\Exports\FalkutasExport;
use App\Exports\filter;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Alumni;
use Barryvdh\DomPDF\Facade\Pdf;

class ExcelDownload extends Controller
{
    public function exportdata()
    {
        return Excel::download(new AlumniExport(), 'data-alumni.xlsx');
    }
    public function exportfalkutas()
    {
        $fakultas = auth()->user()->fakultas;
        $filename = 'alumni_' . $fakultas . '.xlsx';
        return Excel::download(new FalkutasExport(), $filename);
    }

    public function filter(Request $request)
    {
        $filter = $request->input('filteredby');
        $tahun = $request->input('tahun');
        $filename = 'filter_' . $tahun . '_' . $filter . '.xlsx';

        return Excel::download(new filter($tahun, $filter), $filename);
    }

    public function graduate(Request $request)
    {
        $tahun = $request->input('tahun');
        $fakultas = $request->input('fakultas');
        $periode = $request->input('periode_wisuda');

        $query = Alumni::with('prodis');

        if (Alumni::where('status', 1)->exists()) {
            $query->where('status', 1);
        }

        if ($fakultas) {
            $query->where('fakultas', $fakultas);
        }

        if ($tahun) {
            $query->where(function ($q) use ($tahun) {
                $q->where('tahun_wisuda', $tahun)
                  ->orWhereYear('yudisium', $tahun);
            });
        }

        if ($periode) {
            $query->where('periode_wisuda', $periode);
        }

        $alumni = $query->orderBy('prodi')
            ->orderBy('npm')
            ->get();

        $pdf = Pdf::loadView('admin.print.buku_wisuda_pdf', compact('alumni', 'fakultas', 'tahun', 'periode'))
            ->setPaper('a4', 'portrait');

        $cleanFakultas = $fakultas ? str_replace([' ', '/', '\\'], '_', strtolower($fakultas)) : 'semua_fakultas';
        $cleanPeriode = $periode ? '_' . str_replace([' ', '/', '\\'], '_', strtolower($periode)) : '';
        $nameFile = "buku_wisudawan_" . $cleanFakultas . $cleanPeriode . "_" . ($tahun ?: date('Y')) . ".pdf";

        return $pdf->download($nameFile);
    }
}
