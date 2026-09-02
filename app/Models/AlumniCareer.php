<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniCareer extends Model
{
    use HasFactory;

    protected $table = 'alumni_careers';
    protected $guarded = [];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'alumni_id');
    }
}