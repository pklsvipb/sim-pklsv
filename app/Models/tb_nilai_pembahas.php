<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_nilai_pembahas extends Model
{
    use HasFactory;

    public function getMhs()
    {
        return $this->belongsTo('App\Models\tb_mahasiswa', 'id_pembahas', 'id');
    }
}
