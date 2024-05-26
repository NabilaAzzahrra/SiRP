<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim', 
        'student_name', 
        'id_class', 
        'academic_counselors', 
        'financial_status', 
        'ipk', 
        'trial_status', 
        'academic_counselors', 
        'request_recruitment', 
        'gender', 
        'place_of_birth', 
        'date_of_birth', 
        'age', 
        'hamlet', 
        'village', 
        'city', 
        'phone_number', 
        'parents_name', 
        'parents_job', 
        'parents_phone', 
        'competence_test1', 
        'competence_test2', 
        'competence_test3', 
        'competence_test4', 
        'high_school', 
        'major_high_school', 
        'class_year', 
        'graduation_year'
    ];

    protected $table = 'student';

    protected $primaryKey = 'nim';

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'id_class', 'id');
    }

    public function detail()
    {
        return $this->hashMany(Detail::class, 'nim', 'nim');
    }
}
