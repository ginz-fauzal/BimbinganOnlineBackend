<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnakBimbingan extends Model
{
    protected $table = 'anak_bimbingan';

    protected $fillable= [
        'id_ab',
        'nim',
        'nid',
        'status',
    ];
}
