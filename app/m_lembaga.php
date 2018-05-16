<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_lembaga extends Model
{
    public $table = "m_lembaga";
    protected $fillable = [
        'nama_lembaga', 'takhasus_id', 'tahun_berdiri', 'provinsi_id', 'kabupaten_id', 'alamat', 'no_telpon', 'fax', 'email', 'website', 'nama_mudir', 'luas_tanah', 'status', 'pesantren_id'
    ];
}
