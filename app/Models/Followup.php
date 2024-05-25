<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_company',
        'via',
        'followup_result',
        'followup_date',
    ];

    protected $table = 'followup';

    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company', 'id');
    }

}
