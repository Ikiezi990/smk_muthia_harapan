<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }
        public function angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'id_angkatan', 'id');
    }
}
