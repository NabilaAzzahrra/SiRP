<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use Illuminate\Http\Request;

class DetailAPIController extends Controller
{
    public function get_all()
    {

        $detaiQuery = Detail::query();

        $dateStart = request('fromDate', 'all');
        $dateEnd = request('toDate', 'all');

        if ($dateStart !== 'all' && $dateEnd !== 'all') {
            $detaiQuery->whereBetween('created_at', [$dateStart, $dateEnd]);
        }

        $detail = $detaiQuery->with(['recruitmentreport','recruitmentreport.company','student', 'student.classes', 'student.classes.major'])->get();

        return response()->json(['detail' => $detail]);

    }

    public function get_id($id)
    {
        $detail = Detail::with(['student', 'student.classes', 'student.classes.major'])->where('code', $id)->get();
        return response()->json([
            'detail' => $detail,
        ]);
    }

    public function get_code($id, $code)
    {
        $detail = Detail::with(['student', 'student.classes', 'student.classes.major'])
            ->where('code', $id)
            ->where('status', $code)
            ->get();

        return response()->json([
            'detail' => $detail,
        ]);
    }

    public function get_status($id)
    {
        $detail = Detail::with(['student', 'student.classes', 'student.classes.major'])
            ->where('code', $id)
            // ->where('code', $id)
            ->where('status', $id)
            ->get();

        return response()->json([
            'detail' => $detail,
        ]);
    }
}
