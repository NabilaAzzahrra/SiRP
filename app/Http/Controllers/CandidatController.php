<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Detail;
use App\Models\Major;
use App\Models\Recruitment;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatController extends Controller
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
        return view('company_role.index', compact('kode_recruitment'))->with([
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
        $request->validate(
            [
                'code' => 'required',
                'id_company' => 'required',
                'position_required' => 'required',
                'qualification' => 'required',
            ],
            [
                'code.required' => 'Kode tidak boleh kosong',
                'id_company.required' => 'Id Company tidak boleh kosong',
                'position_required.required' => 'Perusahaan tidak boleh kosong',
                'qualification.required' => 'Kualifikasi tidak boleh kosong',
            ],
        );

        $repositories = [
            'code' => $request->input('code'),
            'id_company' => $request->input('id_company'),
            'position_required' => $request->input('position_required'),
            'qualification' => $request->input('qualification'),
        ];

        Recruitment::create($repositories);

        return back()->with('message_delete', 'Data Kelas Sudah dihapus');
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
        return view('company_role.detail', compact('detail'))->with([
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
            'availability' => $request->input('availability'),
        ];

        $recruitment = Recruitment::findOrFail($id);

        if ($recruitment) {
            $recruitment->update($data);
            return redirect()
                ->route('candidat.index')
                ->with('message', 'Data Lowongan Sudah diupdate');
        } else {
            return redirect()
                ->route('candidat.index')
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
        return back()->with('message_delete', 'Data Lowongan Sudah dihapus');
    }

    public function interview(Request $request, $id)
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
            'status' => "INTERVIEW",
        ];

        $detail = Detail::findOrFail($id);

        if ($detail) {
            $detail->update($data);
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
            'status' => "TOLAK",
            'information' => "TIDAK TERMASUK PADA KUALIFIKASI",
        ];

        $detail = Detail::findOrFail($id);

        if ($detail) {
            $detail->update($data);
            return back()->with('message', 'Interview berhasil');
        } else {
            return back()->with('message', 'Error saat mengatur interview');
        }
    }
}
