<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentAPIController extends Controller
{
    public function get_all()
    {
        $student = Student::with(['classes', 'classes.major'])->get();
        return response()->json([
            'student'=>$student,
        ]);
    }
}
