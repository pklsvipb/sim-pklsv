<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_kartu_seminar extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getDosen()
    {
        return $this->belongsTo('App\Models\tb_dosen', 'id_dosen', 'id');
    }
}
