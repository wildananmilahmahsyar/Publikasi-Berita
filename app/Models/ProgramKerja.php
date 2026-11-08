<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    protected $table = 'program_kerjas';

    protected $fillable = [
        'nama_program',
        'divisi',
        'catatan',
    ];
}
