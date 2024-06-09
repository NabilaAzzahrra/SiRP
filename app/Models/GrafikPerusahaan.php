<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrafikPerusahaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'id_company',
        'position_required',
        'passed_candidates',
    ];

    protected $table = 'grafik_perusahaan_month';
}
