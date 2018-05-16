<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_dosen_staf extends Model
{
    public $table = "m_dosen_staf";
    protected $fillable = [
        'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'kewarganegaraan', 'negara_asal', 'kabupaten_asal', 'provinsi_asal', 'alamat', 'status_dosen', 'status_aktif', 'kualifikasi_akademik', 'status_kepegawaian', 'lembaga_id'
    ];
}
