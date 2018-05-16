<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_pesantren extends Model
{
    public $table = "m_pesantren";
    protected $fillable = [
        'nama_pondok_pesantren', 'nama_yayasan', 'takhasus_id','tahun_berdiri','jumlah_santri_lk','jumlah_santri_pr','nama_pengasuh','nama_ketua_yayasan','provinsi_id','kabupaten_id','alamat','no_telp','fax','email','website','luas_tanah'
    ];
}
