<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ref_tamb_tugas_dosen extends Model
{
    public $table = "ref_tamb_tugas_dosen";
    protected $fillable = [
        'kode', 'nama_tamb_tugas_dosen'
    ];
}
