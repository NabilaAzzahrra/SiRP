<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use Illuminate\Http\Request;

class DetailAPIController extends Controller
{
    public function get_id($id)
    {
        $detail = Detail::with(['student', 'student.classes', 'student.classes.major'])->where('code', $id)->get();
        return response()->json([
            'detail'=>$detail,
        ]);
    }
}
