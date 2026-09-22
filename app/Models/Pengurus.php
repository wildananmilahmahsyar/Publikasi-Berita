<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    protected $table = 'pengurus';

    protected $fillable = [
        'nim',
        'nama',
        'jabatan',
        'divisi',
        'foto_pengurus',
    ];
}
