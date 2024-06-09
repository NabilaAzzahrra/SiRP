<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentAPIController extends Controller
{
    public function get_all()
    {
        $recruitment = Recruitment::with(['detail', 'company'])->get();
        return response()->json([
            'recruitment' => $recruitment,
        ]);
    }

    public function get_report()
    {
        $databaseQuery = Recruitment::query();

        $dateStart = request('fromDate', 'all');
        $dateEnd = request('toDate', 'all');
        $id = request('account_active', 'all');

        if ($dateStart !== 'all' && $dateEnd !== 'all') {
            $databaseQuery->whereBetween('created_at', [$dateStart, $dateEnd]);
        }

        $databaseQuery->whereHas('company.user', function ($query) use ($id) {
            if ($id !== 'all') {
                $query->where('account_active', $id);
            }
        });

        $dataRecruitment = $databaseQuery->with([
            'detail',
            'company',
            'company.user',
            'detail.student',
            'detail.student.classes',
            'detail.student.classes.major'
        ])->get();

        return response()->json([
            'recruitment' => $dataRecruitment,
        ]);
    }



    // public function get_serapanb()
    // {
    //     $recruitment = Recruitment::query();

    //     $bidangStart = request('bidang', 'all');
    //     $tahunEnd = request('tahun', 'all');

    //     if ($bidangStart !== 'all' && $tahunEnd !== 'all') {
    //         $recruitment->whereBetween('created_at', [$bidangStart, $tahunEnd]);
    //     }

    //     $dataRecruitment = $recruitment
    //         ->with(['company', 'detail'])
    //         ->whereHas('detail', function ($query) {
    //             $query->where('result', 'LOLOS');
    //         })
    //         ->get();


    //     return response()->json(['recruitment' => $dataRecruitment]);
    // }

    public function get_id($id)
    {
        $recruitment = Recruitment::with(['detail', 'company'])->where('code', $id)->get();
        return response()->json([
            'recruitment' => $recruitment,
        ]);
    }

    public function get_idcode($code)
    {
        $recruitment = Recruitment::with(['detail', 'company'])->where('code', $code)->get();
        return response()->json([
            'recruitment' => $recruitment,
        ]);
    }

    public function get_code($id)
    {
        $recruitment = Recruitment::with(['detail', 'company'])
            ->whereHas('company', function ($query) use ($id) {
                $query->where('code_company', $id);
            })
            ->get();

        if ($recruitment->isEmpty()) {
            return response()->json([
                'message' => 'Recruitment not found',
            ], 404);
        }

        return response()->json([
            'recruitment' => $recruitment,
        ]);
    }
}
