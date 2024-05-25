<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = [
        'major',
    ];

    protected $table = 'major';

    public function classes(){
        return $this->hasMany(Classes::class, 'id_major');
    }
}
