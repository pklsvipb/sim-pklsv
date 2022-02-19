<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_form_004 extends Model
{
    use HasFactory;
    protected $table = 'tb_form_004';
    public $timestamps = false;

    public function getDosen()
    {
        return $this->belongsTo('App\Models\tb_dosen', 'dosen_penjajakan_id', 'id');
    }
}
