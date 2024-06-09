<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerapanProdi extends Model
{
    use HasFactory;

    protected $fillable = [
        'Program_studi',
        'Jumlah',
        'Tahun',
    ];

    protected $table = 'vw_serapan_prodi';
}
