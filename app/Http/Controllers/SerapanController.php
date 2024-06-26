<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Student;
use Illuminate\Http\Request;

class SerapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = request('kriteria', 'all');
        $tahun = request('tahun', 'all');

        $tahun = Student::select('class_year')
            ->GroupBy('class_year')
            ->get();

        $kriteriaStart = ($kriteria === 'all') ? 'Semua Kriteria' : $kriteria;
        $tahunEnd = ($tahun === 'all') ? 'Semua Tahun' : $tahun;

        return view('serapan.index')->with([
            'tahun' => $tahun,

            'kriteriaStart' => $kriteriaStart,
            'tahunEnd' => $tahunEnd,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
