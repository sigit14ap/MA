<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ref_sarpas extends Model
{
    public $table = "ref_sarpas";
    protected $fillable = [
        'ruang_perkuliahan', 'asrama', 'kantor','masjid','mck','komputer','ruang_dosen','aula','lab','luas_ruang_perkuliahan','luas_asrama','luas_ruang_dosen','luas_aula','nama_lab','file_path','lembaga_id'
    ];
}
