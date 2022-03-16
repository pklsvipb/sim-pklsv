<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_daftar extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getProdi()
    {
        return $this->belongsTo('App\Models\tb_prodi', 'id_prodi', 'id');
    }

    public function getModerator()
    {
        return $this->belongsTo('App\Models\tb_dosen', 'id_moderator', 'id');
    }

    public function getMahasiswa()
    {
        return $this->belongsTo('App\Models\tb_mahasiswa', 'id_mhs', 'id');
    }

    public function getDosen()
    {
        return $this->belongsTo('App\Models\tb_dosen', 'id_dosen', 'id');
    }

    public function getDosji()
    {
        return $this->belongsTo('App\Models\tb_dosen', 'id_dosji', 'id');
    }

    public function getPembahas()
    {
        return $this->belongsTo('App\Models\tb_mahasiswa', 'id_pembahas', 'id');
    }
}
