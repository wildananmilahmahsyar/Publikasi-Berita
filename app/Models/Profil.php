<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
        'sejarah',
        'visi',
        'misi',
        'structure_image',
        'nilai_1_title',
        'nilai_1_desc',
        'nilai_2_title',
        'nilai_2_desc',
        'nilai_3_title',
        'nilai_3_desc',
    ];
}