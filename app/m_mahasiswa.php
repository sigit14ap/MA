<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_mahasiswa extends Model
{
    public $table = "m_mahasiswa";
    protected $fillable = [
        'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'mukim', 'kewarganegaraan', 'negara_asal', 'kabupaten_asal', 'provinsi_asal', 'alamat', 'asal_pendidikan', 'lembaga_id'
    ];
}
