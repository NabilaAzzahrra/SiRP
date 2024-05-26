<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'sector',
        'company_type',
        'address',
        'city',
        'email',
        'fax',
        'grade',
        'pic',
        'position',
        'phone_number',
        'mou',
        'relation',
        'kode_pos',
    ];

    protected $table = 'company';

    public function followup(){
        return $this->hasMany(Followup::class, 'id_company');
    }

    public function recruitment(){
        return $this->hasMany(Recruitment::class, 'id_company');
    }

}
