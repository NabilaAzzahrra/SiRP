<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyAPIController extends Controller
{
    public function get_all()
    {
        $company = Company::all();
        return response()->json([
            'company'=>$company,
        ]);
    }

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
