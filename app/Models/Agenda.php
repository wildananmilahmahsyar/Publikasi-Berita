<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'judul',
        'divisi',
        'tanggal_agenda',
        'waktu_agenda',
        'lokasi',
    ];

    protected $casts = [
        'tanggal_agenda' => 'date',
    ];
}