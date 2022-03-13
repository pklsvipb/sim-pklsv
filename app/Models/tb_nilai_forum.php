<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_nilai_forum extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getSeminar()
    {
        return $this->belongsTo('App\Models\tb_daftar', 'id_seminar', 'id');
    }

    public function getMhs()
    {
        return $this->belongsTo('App\Models\tb_mahasiswa', 'id_mhs', 'id');
    }
}
