<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'id_company',
        'position_required',
        'qualification',
    ];

    protected $table = 'recruitment';

    public static function createCode()
    {
        $latestCode = self::orderBy('code', 'desc')->value('code');
        $latestCodeNumber = intval(substr($latestCode, 2)); 
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1; 
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber); 
        return 'RC' . $formattedCodeNumber;
    }

}