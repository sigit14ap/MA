<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ref_takhasus extends Model
{
    public $table = "ref_takhasus";
    protected $fillable = [
        'kode', 'nama_takhasus'
    ];
}
