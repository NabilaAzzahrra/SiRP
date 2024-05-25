<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_major',
        'class_name',
    ];

    protected $table = 'classes';

    public function major()
    {
        return $this->belongsTo(Major::class, 'id_major', 'id');
    }

    public function student()
    {
        return $this->hasMany(Student::class, 'id_class', 'id');
    }
}
