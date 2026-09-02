<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerAlumni extends Model
{
    use HasFactory;

    protected $table = 'tracer_alumnis';
    protected $guarded = [];

    protected $casts = [
        'f17_kompetensi' => 'array',
        'f21_metode_pembelajaran' => 'array',
        'f4_cara_cari_kerja' => 'array',
        'f16_alasan_tidak_sesuai' => 'array',
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'alumni_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}