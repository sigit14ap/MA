<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ref_surat extends Model
{
    public $table = "ref_surat";
    protected $fillable = [
        'nomor_surat', 'tanggal_surat', 'nama_ttd','jenis_surat','file_path','lembaga_id'
    ];
}
