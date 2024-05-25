<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorAPIController extends Controller
{
    public function get_all()
    {
        $major = Major::all();
        return response()->json([
            'major'=>$major,
        ]);
    }
}
