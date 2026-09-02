<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tracer_alumnis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id')->constrained('alumnis')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Identitas Kuesioner (Opsional/Bisa dikoreksi admin)
            $table->string('nik')->nullable();
            $table->string('npwp')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();

            // Soal 1 (f8): Status Utama
            // Options: 1 = Bekerja (fulltime/parttime), 2 = Belum memungkinkan kerja, 3 = Wiraswasta, 4 = Melanjutkan Pendidikan, 5 = Tidak kerja tapi mencari kerja
            $table->integer('f8_status');

            // Soal 2 & 3: Lama cari kerja/gaji (Bekerja/Wiraswasta)
            $table->integer('f502_bulan_cari_kerja')->nullable();
            $table->bigInteger('f505_gaji')->nullable();

            // Soal 4: Lokasi kerja
            $table->string('f5a1_provinsi')->nullable();
            $table->string('f5a2_kabupaten')->nullable();

            // Soal 5, 6, 8: Perusahaan/Instansi
            $table->integer('f1101_jenis_instansi')->nullable();
            $table->string('f1102_instansi_lainnya')->nullable();
            $table->string('f5c_nama_instansi')->nullable();
            $table->string('f5d_tingkat_instansi')->nullable(); // Lokal, Nasional, Internasional

            // Soal 9 & 10: Studi Lanjut
            $table->integer('f18a_sumber_biaya_studi')->nullable();
            $table->string('f18b_perguruan_tinggi')->nullable();
            $table->string('f18c_prodi')->nullable();
            $table->date('f18d_tanggal_masuk')->nullable();
            $table->integer('f1201_sumber_dana')->nullable();
            $table->string('f1202_sumber_dana_lainnya')->nullable();

            // Soal 11 & 12: Relevansi
            $table->integer('f14_hubungan_studi')->nullable(); // 1=Sangat Erat s/d 5=Tidak Sama Sekali
            $table->integer('f15_pendidikan_sesuai')->nullable();

            // Soal 13 & 14: Matriks Evaluasi (Disimpan dalam format JSON)
            $table->json('f17_kompetensi')->nullable(); // Matrix Kompetensi (A & B skala 1-5)
            $table->json('f21_metode_pembelajaran')->nullable(); // Matrix Metode Pembelajaran (skala 1-5)

            // Soal 15 - 20: Proses Mencari Kerja
            $table->integer('f301_waktu_cari_kerja')->nullable();
            $table->json('f4_cara_cari_kerja')->nullable(); // Multi selection array/json
            $table->integer('f6_jumlah_dilamar')->nullable();
            $table->integer('f7_jumlah_respon')->nullable();
            $table->integer('f7a_jumlah_wawancara')->nullable();
            $table->integer('f1001_aktif_cari_kerja')->nullable();

            // Soal 21: Alasan Pekerjaan Tidak Sesuai
            $table->json('f16_alasan_tidak_sesuai')->nullable(); // Multi selection array/json

            // Status Approval Admin: 0 = Pending, 1 = Approved
            $table->boolean('status_approval')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tracer_alumnis');
    }
};