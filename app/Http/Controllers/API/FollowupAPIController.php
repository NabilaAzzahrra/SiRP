<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Followup;
use Illuminate\Http\Request;

class FollowupAPIController extends Controller
{
    public function get_all()
    {
        $followup = Followup::with(['company'])
            ->selectRaw('id_company, MAX(id) as id, MAX(via) as via, MAX(followup_result) as followup_result, MAX(followup_date) as followup_date')
            ->groupBy('id_company')
            ->get();
        return response()->json([
            'followup' => $followup,
        ]);
    }

    public function get_id($id)
    {
        $followup = Followup::with(['company'])->where('id_company', $id)->get();
        return response()->json([
            'followup'=>$followup,
        ]);
    }
}
