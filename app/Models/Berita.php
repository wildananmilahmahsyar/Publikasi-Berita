<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'title',
        'category',
        'divisi',
        'lokasi',
        'tanggal_kegiatan',
        'is_proker',
        'image',
        'content',
    ];

    protected $casts = [
        'tanggal_kegiatan' => 'date',
        'is_proker' => 'boolean',
    ];
}