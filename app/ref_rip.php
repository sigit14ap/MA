<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ref_rip extends Model
{
    public $table = "ref_rip";
    protected $fillable = [
        'judul_rip', 'file_path', 'lembaga_id'
    ];
}
