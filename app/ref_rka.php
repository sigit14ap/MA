<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ref_rka extends Model
{
    public $table = "ref_rka";
    protected $fillable = [
        'sumber_pendanaan', 'laporan_keuangan', 'ang_blj_tahunan','ket_sumber_pendanaan','ket_laporan_keuangan','ket_ang_blj_tahunan','file_path','lembaga_id'
    ];
}
