<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Company;
use App\Models\Detail;
use App\Models\Recruitment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $company = Company::where('account_active', Auth::user()->id)->get();
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

        $code = $request->input('kode');
        $students = $request->input('student', []);
        $nims = $request->input('nim', []);
        $classes = $request->input('classes', []);

        foreach ($students as $index => $student) {
            $dataa = [
                'code' => $code,
                'nim' => $student,
                'result' => "BELUM",
                'status' => "KANDIDAT",
                'created_at' => now(),
                'updated_at' => now(),
            ];
            Detail::create($dataa);
        }

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
        $company = Company::all();
        $recruitment = Recruitment::where('code', $id)->first();
        $detail = Detail::where('code', $id)->first();
        $student = Student::all();
        return view('recruitment.candidat', compact('detail'))->with([
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
        $request->validate(
            [
                'position_required' => 'required',
                'qualification' => 'required',
            ],
            [
                'position_required.required' => 'Posisi tidak boleh kosong',
                'qualification.required' => 'Kualifikasi tidak boleh kosong',
            ],
        );

        $data = [
            'position_required' => $request->input('position_required'),
            'qualification' => $request->input('qualification'),
        ];

        $recruitment = Recruitment::findOrFail($id);

        if ($recruitment) {
            $recruitment->update($data);
            return redirect()
                ->route('recruitment.index')
                ->with('message', 'Data Lowongan Sudah diupdate');
        } else {
            return redirect()
                ->route('recruitment.index')
                ->with('error', 'Data Lowongan tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recruitment = Recruitment::where('code', $id)->first();
        $details = Detail::where('code', $id)->get();
        $recruitment->delete();
        foreach ($details as $key => $detail) {
            $detail->delete();
        }
        return back()->with('message_delete','Data Lowongan Sudah dihapus');
    }
}
