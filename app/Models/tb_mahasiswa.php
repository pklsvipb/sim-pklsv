<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_mahasiswa extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getProdi()
    {
        return $this->belongsTo('App\Models\tb_prodi', 'id_prodi', 'id');
    }

    public function getDospem1()
    {
        return $this->belongsTo('App\Models\tb_dosen', 'id_dospem1', 'id');
    }

    public function getDospem2()
    {
        return $this->belongsTo('App\Models\tb_dosen', 'id_dospem2', 'id');
    }
}
