<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerapanBidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'Bidang',
        'Jumlah',
        'Tahun',
    ];

    protected $table = 'vw_serapan_bidang';
}
