<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_panitia extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getProdi()
    {
        return $this->belongsTo('App\Models\tb_prodi', 'id_prodi', 'id');
    }
}
