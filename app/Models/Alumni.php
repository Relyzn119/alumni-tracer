<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumnis';
    protected $guarded = [];

    public function minat()
    {
        return $this->belongsTo(Peminatan::class, 'peminatan');
    }

    public function prodis()
    {
        return $this->belongsTo(Prodi::class, 'prodi');
    }

    public function dosenpenguji1()
    {
        return $this->belongsTo(Dosen::class, 'penguji1');
    }

    public function dosenpenguji2()
    {
        return $this->belongsTo(Dosen::class, 'penguji2');
    }

    public function dosenpembimbing1()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing1');
    }

    public function dosenpembimbing2()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing2');
    }

    // ==========================================================
    // TAMBAHKAN RELASI TRACER STUDY & RIWAYAT KARIR DI BAWAH INI
    // ==========================================================

    /**
     * Relasi ke data kuesioner Tracer Study
     */
    public function tracer()
    {
        return $this->hasOne(TracerAlumni::class, 'alumni_id')->latestOfMany();
    }

    /**
     * Relasi ke riwayat/jejak karir alumni
     */
    public function careers()
    {
        return $this->hasMany(AlumniCareer::class, 'alumni_id');
    }
}