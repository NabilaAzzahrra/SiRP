<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyAPIController extends Controller
{
    public function get_all()
    {
        $databaseQuery = Company::query();

        $id = request('account_active', 'all');

        if ($id !== 'all') {
            $databaseQuery->where('account_active', $id);
        }

        $company = $databaseQuery->whereHas('user')->with(['user'])->get();


        return response()->json(['company' => $company]);
    }

//     public function get_all()
//     {
//         $databaseQuery = RegisterByProgram::query();

//         $id = request('id', 'all');

//         if ($id !== 'all') {
//             $databaseQuery->where('pmb', $id);
//         }

//         $databases = $databaseQuery->get();

//         return response()->json($databases);
//     }

    public function get_report()
    {
        $companyQuery = Company::query();

        $dateStart = request('fromDate', 'all');
        $dateEnd = request('toDate', 'all');

        if ($dateStart !== 'all' && $dateEnd !== 'all') {
            $companyQuery->whereBetween('created_at', [$dateStart, $dateEnd]);
        }

        $company = $companyQuery->where('mou','SUDAH')->get();

        return response()->json(['company' => $company]);
    }
}
