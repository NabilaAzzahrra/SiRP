<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'nim',
        'classes',
        'result',
        'status',
        'information',
    ];

    protected $table = 'detail';

    public function recruitment()
    {
        return $this->belongsTo(Recruitment::class, 'code');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'nim', 'nim');
    }
}
