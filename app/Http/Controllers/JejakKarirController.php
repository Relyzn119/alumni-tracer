<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Prodi;
use Illuminate\Http\Request;

class JejakKarirController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $prodis = $request->input('prodi');
        $prodi = Prodi::all();

        // Cari alumni yang sudah approved & memiliki tracer yang di-approve Admin
        $datas = Alumni::with(['minat', 'prodis'])
            ->where('status', 1)
            ->whereHas('tracer', function ($q) {
                $q->where('status_approval', 1);
            })
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', '%' . $search . '%')
                             ->orWhere('npm', 'like', '%' . $search . '%');
            })
            ->when($prodis, function ($query) use ($prodis) {
                return $query->where('prodi', $prodis);
            })
            ->paginate(10);

        return view('FrontPage.JejakKarir', compact('prodi', 'datas'));
    }

    public function detail($id)
    {
        // Hanya tampilkan data non-sensitif untuk publik
        $alumni = Alumni::with(['minat', 'prodis'])->where('status', 1)->findOrFail($id);
        
        // Ambil riwayat karir
        $careers = \App\Models\AlumniCareer::where('alumni_id', $alumni->id)
            ->orderBy('is_current', 'desc')
            ->orderBy('tahun_mulai', 'desc')
            ->get();

        return view('FrontPage.JejakKarirDetail', compact('alumni', 'careers'));
    }
}