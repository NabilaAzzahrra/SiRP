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
}
