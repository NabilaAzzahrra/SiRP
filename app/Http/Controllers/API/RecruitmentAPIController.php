<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentAPIController extends Controller
{
    public function get_all()
    {
        $recruitment = Recruitment::with(['detail','company'])->get();
        return response()->json([
            'recruitment'=>$recruitment,
        ]);
    }

    public function get_id($id)
    {
        $recruitment = Recruitment::with(['detail','company'])->where('code', $id)->get();
        return response()->json([
            'recruitment'=>$recruitment,
        ]);
    }
}
