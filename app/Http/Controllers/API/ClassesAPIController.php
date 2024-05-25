<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesAPIController extends Controller
{
    public function get_all()
    {
        $classes = Classes::with(['major'])->get();
        return response()->json([
            'classes'=>$classes,
        ]);
    }
}
