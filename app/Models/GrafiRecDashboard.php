<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrafiRecDashboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'Bidang',
        'Jumlah Recruitment',
    ];

    protected $table = 'vw_grafik_recruitment_month';
}
