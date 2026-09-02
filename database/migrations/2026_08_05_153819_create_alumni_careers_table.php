<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alumni_careers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id')->constrained('alumnis')->onDelete('cascade');
            $table->foreignId('tracer_alumni_id')->nullable()->constrained('tracer_alumnis')->onDelete('cascade');
            $table->string('perusahaan');
            $table->string('jenis_instansi')->nullable();
            $table->string('posisi_jabatan')->nullable();
            $table->string('lokasi')->nullable();
            $table->integer('tahun_mulai')->nullable();
            $table->integer('tahun_selesai')->nullable(); // Nullable jika masih aktif bekerja
            $table->boolean('is_current')->default(true); // Pekerjaan aktif saat ini
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumni_careers');
    }
};