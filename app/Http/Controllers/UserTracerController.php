<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\AlumniCareer;
use App\Models\TracerAlumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTracerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Cek 1: Apakah alumni sudah terdaftar di tabel alumnis berdasarkan NPM?
        $alumni = Alumni::where('npm', $user->npm)->first();

        if (!$alumni) {
            return redirect()->route('Daftar.create')->with('toast_error', 'Anda harus mengisi data Alumni terlebih dahulu.');
        }

        // Cek 2: Apakah Data Alumni sudah di-approve oleh Admin (status == 1)?
        if ($alumni->status != 1) {
            return view('User.Tracer.blocked', compact('alumni'));
        }

        // Ambil data tracer yang sudah diisi sebelumnya jika ada
        $tracer = TracerAlumni::where('alumni_id', $alumni->id)->latest()->first();
        $careers = AlumniCareer::where('alumni_id', $alumni->id)->orderBy('tahun_mulai', 'desc')->get();

        return view('User.Tracer.index', compact('alumni', 'tracer', 'careers'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $alumni = Alumni::where('npm', $user->npm)->firstOrFail();

        if ($alumni->status != 1) {
            return redirect()->back()->with('toast_error', 'Data Alumni Anda belum di-approve Admin.');
        }

        // Validasi dasar
        $request->validate([
            'f8_status' => 'required',
        ], [
            'f8_status.required' => 'Status saat ini wajib dipilih.',
        ]);

        // Pemetaan eksplisit untuk menghindari error "Array to string conversion"
        $tracerData = [
            'alumni_id' => $alumni->id,
            'user_id' => $user->id,
            
            // Identitas Kuesioner
            'nik' => $request->nik,
            'npwp' => $request->npwp,
            'no_hp' => $request->no_hp,
            
            // Soal 1
            'f8_status' => $request->f8_status,
            
            // Soal Bekerja / Wiraswasta
            'f502_bulan_cari_kerja' => $request->f502_bulan_cari_kerja,
            'f505_gaji' => $request->f505_gaji,
            'f5a1_provinsi' => $request->f5a1_provinsi,
            'f5a2_kabupaten' => $request->f5a2_kabupaten,
            'f1101_jenis_instansi' => $request->f1101_jenis_instansi,
            'f1102_instansi_lainnya' => $request->f1102_instansi_lainnya,
            'f5c_nama_instansi' => $request->f5c_nama_instansi,
            'f5d_tingkat_instansi' => $request->f5d_tingkat_instansi,
            'f14_hubungan_studi' => $request->f14_hubungan_studi,
            'f15_pendidikan_sesuai' => $request->f15_pendidikan_sesuai,
            
            // Soal Studi Lanjut
            'f18a_sumber_biaya_studi' => $request->f18a_sumber_biaya_studi,
            'f18b_perguruan_tinggi' => $request->f18b_perguruan_tinggi,
            'f18c_prodi' => $request->f18c_prodi,
            'f18d_tanggal_masuk' => $request->f18d_tanggal_masuk,
            'f1201_sumber_dana' => $request->f1201_sumber_dana,
            'f1202_sumber_dana_lainnya' => $request->f1202_sumber_dana_lainnya,
            
            // Matriks (Tercast Otomatis Ke JSON oleh Model TracerAlumni)
            'f17_kompetensi' => $request->f17,
            'f21_metode_pembelajaran' => $request->f21_metode,
            
            // Soal Mencari Kerja
            'f301_waktu_cari_kerja' => $request->f301_waktu_cari_kerja,
            'f4_cara_cari_kerja' => $request->f4_cara_cari_kerja,
            'f6_jumlah_dilamar' => $request->f6_jumlah_dilamar,
            'f7_jumlah_respon' => $request->f7_jumlah_respon,
            'f7a_jumlah_wawancara' => $request->f7a_jumlah_wawancara,
            'f1001_aktif_cari_kerja' => $request->f1001_aktif_cari_kerja,
            'f16_alasan_tidak_sesuai' => $request->f16_alasan_tidak_sesuai,
            
            // Status Approval Admin
            'status_approval' => 0,
        ];

        // Simpan / update kuesioner tracer
        $tracer = TracerAlumni::updateOrCreate(
            ['alumni_id' => $alumni->id],
            $tracerData
        );

        // Jika status bekerja/wiraswasta (f8_status == 1 atau 3) dan ada nama instansi, catat ke riwayat karir
        if (in_array($request->f8_status, [1, 3]) && $request->f5c_nama_instansi) {
            // Set karir lama menjadi tidak aktif (is_current = false)
            AlumniCareer::where('alumni_id', $alumni->id)->update(['is_current' => false]);

            // Buat record karir baru
            AlumniCareer::create([
                'alumni_id' => $alumni->id,
                'tracer_alumni_id' => $tracer->id,
                'perusahaan' => $request->f5c_nama_instansi,
                'jenis_instansi' => $request->f1102_instansi_lainnya ?? $request->f1101_jenis_instansi,
                'lokasi' => trim(($request->f5a1_provinsi ?? '') . ' ' . ($request->f5a2_kabupaten ?? '')),
                'tahun_mulai' => date('Y'),
                'is_current' => true,
            ]);
        }

        return redirect()->route('user.tracer.index')->with('toast_success', 'Kuesioner Tracer Study berhasil dikirim! Menunggu verifikasi Admin.');
    }
}