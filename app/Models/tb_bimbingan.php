<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_bimbingan extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getMahasiswa()
    {
        return $this->belongsTo('App\Models\tb_mahasiswa', 'id_mhs', 'id');
    }
}
