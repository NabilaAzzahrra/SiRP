<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Detail;
use App\Models\Major;
use App\Models\Recruitment;
use App\Models\Student;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kode_recruitment = Recruitment::createCode();
        $company = Company::all();
        $major = Major::all();
        return view('company_role.interview', compact('kode_recruitment'))->with([
            'company' => $company,
            'major' => $major,
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
    public function show($id, $code)
    {
        $company = Company::all();
        $recruitment = Recruitment::where('id', $id)->first();
        $detail = Detail::where('code', $code)->first();
        $student = Student::all();
        return view('company_role.detail_interview', compact('detail'))->with([
            'company' => $company,
            'recruitment' => $recruitment,
            'detail' => $detail,
            'student' => $student,
        ]);
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

    public function terima(Request $request, $id)
    {
        $request->validate(
            [
                'status' => 'required',
            ],
            [
                'status.required' => 'Status tidak boleh kosong',
            ]
        );

        $data = [
            'result' => "LOLOS",
            'status' => $request->input('status'),
        ];

        $detail = Detail::findOrFail($id);

        $std = [
            'trial_status' =>  $request->input('status'),
        ];

        $nim = $request->input('nim');

        $student = Student::findOrFail($nim);

        if ($detail) {
            $detail->update($data);
            $student->update($std);
            return back()->with('message', 'Interview berhasil');
        } else {
            return back()->with('message', 'Error saat mengatur interview');
        }
    }

    public function tolak(Request $request, $id)
    {
        $request->validate(
            [
                'status' => 'required',
            ],
            [
                'status.required' => 'Status tidak boleh kosong',
            ]
        );

        $data = [
            'result' => "GAGAL",
            'status' => "TOLAK",
            'information' => "TIDAK LOLOS INTERVIEW",
        ];

        $detail = Detail::findOrFail($id);

        $std = [
            'trial_status' =>  "GAGAL",
        ];

        $nim = $request->input('nim');

        $student = Student::findOrFail($nim);

        if ($detail) {
            $detail->update($data);
            $student->update($std);
            return back()->with('message', 'Interview berhasil');
        } else {
            return back()->with('message', 'Error saat mengatur interview');
        }
    }
}
