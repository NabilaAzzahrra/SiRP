<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_company',
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
        'account_active',
    ];

    protected $table = 'company';

    public function followup(){
        return $this->hasMany(Followup::class, 'id_company');
    }

    public function recruitment(){
        return $this->hasMany(Recruitment::class, 'id_company', 'code_company');
    }

    public static function createCode()
    {
        $latestCode = self::orderBy('code_company', 'desc')->value('code_company');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'CP' . $formattedCodeNumber;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'account_active', 'id');
    }

}
