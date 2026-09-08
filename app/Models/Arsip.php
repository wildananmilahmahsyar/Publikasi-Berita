<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $fillable = [
        'no_dokumen',
        'nama_dokumen',
        'kategori',
        'file_pdf',
    ];
}