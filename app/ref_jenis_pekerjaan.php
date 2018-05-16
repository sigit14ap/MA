<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ref_jenis_pekerjaan extends Model
{
    public $table = "ref_jenis_pekerjaan";
    protected $fillable = [
        'kode', 'nama_jenis_pekerjaan'
    ];
}
