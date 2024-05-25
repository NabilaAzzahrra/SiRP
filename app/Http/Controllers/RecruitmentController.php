<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Company;
use App\Models\Recruitment;
use App\Models\Student;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruitment = Recruitment::all();
        $classes = Classes::all();
        $company = Company::all();
        return view('recruitment')->with([
            'classes' => $classes,
            'company' => $company,
            'recruitment' => $recruitment,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode_recruitment = Recruitment::createCode();
        $recruitment = Recruitment::all();
        $classes = Classes::all();
        $company = Company::all();
        $student = Student::all();
        return view('recruitment.create', compact('kode_recruitment'))->with([
            'classes' => $classes,
            'company' => $company,
            'recruitment' => $recruitment,
            'student' => $student,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'kode' => 'required',
                'company_name' => 'required',
                'position_required' => 'required',
                'qualification' => 'required',
            ],
            [
                'kode.required' => 'Kode tidak boleh kosong',
                'company_name.required' => 'Perusahaan tidak boleh kosong',
                'position_required.required' => 'Posisi tidak boleh kosong',
                'qualification.required' => 'Kualifikasi tidak boleh kosong',
            ],
        );

        $repositories = [
            'code' => $request->input('kode'),
            'id_company' => $request->input('company_name'),
            'position_required' => $request->input('position_required'),
            'qualification' => $request->input('qualification'),
        ];

        Recruitment::create($repositories);

        return redirect()
            ->route('recruitment.index')
            ->with('message', 'Data Recruitment Sudah ditambahkan');
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
