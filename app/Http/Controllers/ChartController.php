<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $data = [
            'labels' => ['Label 1', 'Label 2', 'Label 3'],
            'data' => [30, 40, 30],
        ];

        return view('dashboard', compact('data'));
    }
}
