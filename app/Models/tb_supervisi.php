<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_supervisi extends Model
{
    use HasFactory;

    public function getProdi()
    {
        return $this->belongsTo('App\Models\tb_prodi', 'id_prodi', 'id');
    }
}
