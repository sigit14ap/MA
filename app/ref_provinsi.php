<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ref_provinsi extends Model
{
    public $table = "ref_provinsi";
    protected $fillable = [
        'nama_provinsi'
    ];
}
