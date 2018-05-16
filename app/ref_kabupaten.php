<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ref_kabupaten extends Model
{
    public $table = "ref_kabupaten";
    protected $fillable = [
        'nama_kabupaten', 'provinsi_id'
    ];
}
