<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Followup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::where('account_active', Auth::user()->id)->get();
        $followup = Followup::all()->groupBy('id_company');
        // $company = Company::where('id', $id)->get();
        // $company = Company::where('id', $id)->first();
        return view('followup')->with([
            'company' => $company,
            'followup' => $followup,
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
                'followup_date' => 'required',
                'company_name' => 'required',
                'address' => 'required',
                'city' => 'required',
                'sector' => 'required',
                'pic' => 'required',
                'position' => 'required',
                'phone_number' => 'required',
                'via' => 'required',
                'followup_result' => 'required',
            ],
            [
                'followup_date.required' => 'Tanggal Follow-Up tidak boleh kosong',
                'company_name.required' => 'Perusahaan tidak boleh kosong',
                'address.required' => 'Alamat tidak boleh kosong',
                'city.required' => 'Kota tidak boleh kosong',
                'sector.required' => 'Bidang tidak boleh kosong',
                'pic.required' => 'Kontak Person tidak boleh kosong',
                'position.required' => 'Posisi Kontak Person tidak boleh kosong',
                'phone_number.required' => 'Nomor Kontak Person tidak boleh kosong',
                'via.required' => 'Harap Diisi',
                'followup_result.required' => 'Harap Diisi',
            ],
        );

        $followup = [
            'followup_date' => $request->input('followup_date'),
            'id_company' => $request->input('company_name'),
            'via' => $request->input('via'),
            'followup_result' => $request->input('followup_result'),
        ];

        Followup::create($followup);

        // return back('company.index')->with('message', 'Data Type Sudah ditambahkan');
        return redirect()
            ->route('followup.index')
            ->with('message', 'Data Follow-Up Sudah ditambahkan');
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
        // $classes = Classes::all();
        $company = Company::all();
        $company_detail = Company::where('id', $id)->first();
        $followup = Followup::where('id_company', $id)->get();
        // dd($followup);
        // $student = Student::where('nim', $id)->first();
        return view('followup.edit')->with([
            'followup' => $followup,
            'company' => $company,
            'company_detail' => $company_detail
        ]);
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
        $data = [
            'followup_date' => $request->input('followup_date'),
            'via' => $request->input('via'),
            'followup_result' => $request->input('followup_result'),
        ];

        $followup = Followup::findOrFail($id);

        if ($followup) {
            $followup->update($data);
            return redirect()
                ->route('followup.index')
                ->with('message', 'Data Kelas Sudah diupdate');
        } else {
            return redirect()
                ->route('followup.index')
                ->with('error', 'Data Kelas tidak ditemukan');
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
        $followup = Followup::findOrFail($id);
        $followup->delete();
        return back()->with('message_delete','Data Follow-Up Sudah dihapus');
    }

    public function getcompany($id)
    {
        $company = Company::where('id', $id)->first();

        return response()->json(['company' => $company]);
    }
}
