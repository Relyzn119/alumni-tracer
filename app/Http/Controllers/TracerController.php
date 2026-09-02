<?php

namespace App\Http\Controllers;

use App\Models\AlumniCareer;
use App\Models\TracerAlumni;
use Illuminate\Http\Request;

class TracerController extends Controller
{
    public function index()
    {
        // Ambil data pengisian tracer alumni beserta relasi alumni & prodi
        $tracers = TracerAlumni::with(['alumni.prodis', 'alumni.minat', 'user'])
            ->latest()
            ->get();

        return view('admin.tracer.index', compact('tracers'));
    }

    public function edit($id)
    {
        $tracer = TracerAlumni::with(['alumni.prodis', 'alumni.minat'])->findOrFail($id);
        return view('admin.tracer.edit', compact('tracer'));
    }

    public function update(Request $request, $id)
    {
        $tracer = TracerAlumni::findOrFail($id);

        // Data update dari form admin
        $updateData = [
            'nik' => $request->nik,
            'npwp' => $request->npwp,
            'no_hp' => $request->no_hp,
            
            'f8_status' => $request->f8_status,
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
            
            'f18a_sumber_biaya_studi' => $request->f18a_sumber_biaya_studi,
            'f18b_perguruan_tinggi' => $request->f18b_perguruan_tinggi,
            'f18c_prodi' => $request->f18c_prodi,
            'f18d_tanggal_masuk' => $request->f18d_tanggal_masuk,
            'f1201_sumber_dana' => $request->f1201_sumber_dana,
            'f1202_sumber_dana_lainnya' => $request->f1202_sumber_dana_lainnya,
            
            'f17_kompetensi' => $request->f17,
            'f21_metode_pembelajaran' => $request->f21_metode,
            
            'f301_waktu_cari_kerja' => $request->f301_waktu_cari_kerja,
            'f6_jumlah_dilamar' => $request->f6_jumlah_dilamar,
            'f7_jumlah_respon' => $request->f7_jumlah_respon,
            'f7a_jumlah_wawancara' => $request->f7a_jumlah_wawancara,
            'f1001_aktif_cari_kerja' => $request->f1001_aktif_cari_kerja,
            
            'status_approval' => $request->status_approval ?? $tracer->status_approval,
        ];

        $tracer->update($updateData);

        // Jika ada perubahan nama perusahaan/instansi, perbarui juga data riwayat karirnya
        if ($request->f5c_nama_instansi) {
            AlumniCareer::updateOrCreate(
                ['tracer_alumni_id' => $tracer->id],
                [
                    'alumni_id' => $tracer->alumni_id,
                    'perusahaan' => $request->f5c_nama_instansi,
                    'jenis_instansi' => $request->f1102_instansi_lainnya ?? $request->f1101_jenis_instansi,
                    'lokasi' => trim(($request->f5a1_provinsi ?? '') . ' ' . ($request->f5a2_kabupaten ?? '')),
                    'is_current' => true
                ]
            );
        }

        return redirect()->route('tracer-alumni.index')->with('toast_success', 'Data Tracer Study berhasil diperbarui oleh Admin!');
    }

    public function approve($id)
    {
        $tracer = TracerAlumni::findOrFail($id);
        $tracer->update(['status_approval' => 1]);
        return redirect()->back()->with('toast_success', 'Data Tracer Study Alumni berhasil di-Approve!');
    }

    public function pending($id)
    {
        $tracer = TracerAlumni::findOrFail($id);
        $tracer->update(['status_approval' => 0]);
        return redirect()->back()->with('toast_success', 'Status Data Tracer Study diubah menjadi Pending!');
    }

    public function destroy($id)
    {
        $tracer = TracerAlumni::findOrFail($id);
        $tracer->delete();
        return redirect()->back()->with('toast_success', 'Data Tracer Study berhasil dihapus!');
    }
}