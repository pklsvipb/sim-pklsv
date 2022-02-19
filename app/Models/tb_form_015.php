<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_form_015 extends Model
{
    use HasFactory;
    protected $table = 'tb_form_015';
    public $timestamps = false;

    public function getDosen()
    {
        return $this->belongsTo('App\Models\tb_dosen', 'dosen_supervisi_id', 'id');
    }
}
