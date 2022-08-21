<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSpp extends Model
{
    use HasFactory;
    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp', 'id');
    }
                public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }
}
