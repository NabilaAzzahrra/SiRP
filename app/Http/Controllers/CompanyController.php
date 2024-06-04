<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        // $company = Company::where('id', $id)->get();
        // $company = Company::where('id', $id)->first();
        return view('company')->with([
            'company' => $company,
        ]);
        // return view('company');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode_company = Company::createCode();
        return view('company.add', compact('kode_company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // $request->validate(
    //     //     [
    //     //         'company_name' => ['required'],
    //     //         'sector' => ['required'],
    //     //         'address' => ['required'],
    //     //         'city' => ['required'],
    //     //         'grade' => ['required'],
    //     //         'pic' => ['required'],
    //     //         'position' => ['required'],
    //     //         'phone_number' => ['required'],
    //     //         'relation' => ['required'],
    //     //         'mou' => ['required'],
    //     //     ],
    //     //     [
    //     //         'company_name.required' => 'Nama Perusahaan tidak boleh kosong',
    //     //         'sector.required' => 'Nama Perusahaan tidak boleh kosong',
    //     //         'address.required' => 'Nama Perusahaan tidak boleh kosong',
    //     //         'city.required' => 'Nama Perusahaan tidak boleh kosong',
    //     //         'grade.required' => 'Nama Perusahaan tidak boleh kosong',
    //     //         'pic.required' => 'Nama Perusahaan tidak boleh kosong',
    //     //         'position.required' => 'Nama Perusahaan tidak boleh kosong',
    //     //         'phone_number.required' => 'Nama Perusahaan tidak boleh kosong',
    //     //         'relation.required' => 'Nama Perusahaan tidak boleh kosong',
    //     //         'mou.required' => 'Nama Perusahaan tidak boleh kosong',
    //     //     ],
    //     // );

    //     if (
    //         $repositories = [
    //             'grade' => 'null',
    //         ]
    //     ) {
    //         $request->validate(
    //             [
    //                 'grade' => ['required'],
    //             ],
    //             [
    //                 'grade.required' => 'Nama Perusahaan tidak boleh kosong',
    //             ],
    //         );
    //     } elseif (
    //         $repositories = [
    //             'relation' => 'null',
    //         ]
    //     ) {
    //         $request->validate(
    //             [
    //                 'relation' => ['required'],
    //             ],
    //             [
    //                 'relation.required' => 'Nama Perusahaan tidak boleh kosong',
    //             ],
    //         );
    //     } elseif (
    //         $repositories = [
    //             'mou' => 'null',
    //         ]
    //     ) {
    //         $request->validate(
    //             [
    //                 'mou' => ['required'],
    //             ],
    //             [
    //                 'mou.required' => 'Nama Perusahaan tidak boleh kosong',
    //             ],
    //         );
    //     } elseif (
    //         $repositories = [
    //             'grade' => 'null',
    //             'relation' => 'null',
    //             'mou' => 'null',
    //         ]
    //     ) {
    //         $request->validate(
    //             [
    //                 'grade' => ['required'],
    //                 'relation' => ['required'],
    //                 'mou' => ['required'],
    //             ],
    //             [
    //                 'grade.required' => 'Nama Perusahaan tidak boleh kosong',
    //                 'relation.required' => 'Nama Perusahaan tidak boleh kosong',
    //                 'mou.required' => 'Nama Perusahaan tidak boleh kosong',
    //             ],
    //         );
    //     } elseif (
    //         $repositories = [
    //             'company_name' => '',
    //             'sector' => '',
    //             'address' => '',
    //             'city' => '',
    //             'grade' => '',
    //             'pic' => '',
    //             'position' => '',
    //             'phone_number' => '',
    //             'relation' => '',
    //             'grade' => 'null',
    //             'relation' => 'null',
    //             'mou' => 'null',
    //         ]
    //     ) {
    //         $request->validate(
    //             [
    //                 'company_name' => ['required'],
    //                 'sector' => ['required'],
    //                 'address' => ['required'],
    //                 'city' => ['required'],
    //                 'grade' => ['required'],
    //                 'pic' => ['required'],
    //                 'position' => ['required'],
    //                 'phone_number' => ['required'],
    //                 'relation' => ['required'],
    //                 'mou' => ['required'],
    //                 'grade' => ['required'],
    //                 'relation' => ['required'],
    //                 'mou' => ['required'],
    //             ],
    //             [
    //                 'company_name.required' => 'Nama Perusahaan tidak boleh kosong',
    //                 'sector.required' => 'Nama Perusahaan tidak boleh kosong',
    //                 'address.required' => 'Nama Perusahaan tidak boleh kosong',
    //                 'city.required' => 'Nama Perusahaan tidak boleh kosong',
    //                 'grade.required' => 'Nama Perusahaan tidak boleh kosong',
    //                 'pic.required' => 'Nama Perusahaan tidak boleh kosong',
    //                 'position.required' => 'Nama Perusahaan tidak boleh kosong',
    //                 'phone_number.required' => 'Nama Perusahaan tidak boleh kosong',
    //                 'relation.required' => 'Nama Perusahaan tidak boleh kosong',
    //                 'mou.required' => 'Nama Perusahaan tidak boleh kosong',
    //                 'grade.required' => 'Nama Perusahaan tidak boleh kosong',
    //                 'relation.required' => 'Nama Perusahaan tidak boleh kosong',
    //                 'mou.required' => 'Nama Perusahaan tidak boleh kosong',
    //             ],
    //         );
    //     }

    //     $repositories = [
    //         'series' => date('Ymdhis'),
    //         'title' => $request->input('title'),
    //         'company_name' => $request->input('company_name'),
    //         'sector' => $request->input('sector'),
    //         'address' => $request->input('address'),
    //         'city' => $request->input('city'),
    //         'grade' => $request->input('grade'),
    //         'pic' => $request->input('pic'),
    //         'position' => $request->input('position'),
    //         'phone_number' => $request->input('phone_number'),
    //         'relation' => $request->input('relation'),
    //         'mou' => $request->input('mou'),
    //         'grade' => $request->input('grade'),
    //         'relation' => $request->input('relation'),
    //         'mou' => $request->input('mou'),
    //     ];
    //     Company::create($repositories);
    //     return back()->with('message', 'Data Type Sudah ditambahkan');
    // }

    public function store(Request $request)
    {
        $request->validate(
            [
                'company_name' => 'required',
                'company_type' => 'required',
                'sector' => 'required',
                'address' => 'required',
                'city' => 'required',
                'grade' => 'required',
                'pic' => 'required',
                'position' => 'required',
                'phone_number' => 'required',
                'relation' => 'required',
                'mou' => 'required',
            ],
            [
                'company_name.required' => 'Nama Perusahaan tidak boleh kosong',
                'company_type.required' => 'Type Perusahaan tidak boleh kosong',
                'sector.required' => 'Sektor tidak boleh kosong',
                'address.required' => 'Alamat tidak boleh kosong',
                'city.required' => 'Kota tidak boleh kosong',
                'grade.required' => 'Grade tidak boleh kosong',
                'pic.required' => 'PIC tidak boleh kosong',
                'position.required' => 'Posisi tidak boleh kosong',
                'phone_number.required' => 'Nomor Telepon tidak boleh kosong',
                'relation.required' => 'Relasi tidak boleh kosong',
                'mou.required' => 'MOU tidak boleh kosong',
            ],
        );

        $repositories = [
            'code_company' => $request->input('code_company'),
            'series' => date('Ymdhis'),
            'title' => $request->input('title'),
            'company_name' => $request->input('company_name'),
            'company_type' => $request->input('company_type'),
            'email' => $request->input('email'),
            'sector' => $request->input('sector'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'grade' => $request->input('grade'),
            'pic' => $request->input('pic'),
            'position' => $request->input('position'),
            'phone_number' => $request->input('phone_number'),
            'relation' => $request->input('relation'),
            'mou' => $request->input('mou'),
            'kode_pos' => $request->input('kode_pos'),
            'fax' => $request->input('fax'),
        ];

        Company::create($repositories);

        $user = User::create([
            'name' => $request->input('company_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('code_company')),
            'role' => 'P',
            'id_company' => $request->input('code_company'),
        ]);

        // return back('company.index')->with('message', 'Data Type Sudah ditambahkan');
        return redirect()
            ->route('company.index')
            ->with('message', 'Data Type Sudah ditambahkan');
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
        // $company = Company::all();
        // $company = Company::where('id', $id)->get();
        $company = Company::where('id', $id)->first();
        return view('company.edit')->with([
            'company' => $company,
        ]);

        // return view('company.edit');
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
                'company_name' => 'required',
                'company_type' => 'required',
                'sector' => 'required',
                'address' => 'required',
                'city' => 'required',
                'grade' => 'required',
                'pic' => 'required',
                'position' => 'required',
                'phone_number' => 'required',
                'relation' => 'required',
                'mou' => 'required',
            ],
            [
                'company_name.required' => 'Nama Perusahaan tidak boleh kosong',
                'company_type.required' => 'Type Perusahaan tidak boleh kosong',
                'sector.required' => 'Sektor tidak boleh kosong',
                'address.required' => 'Alamat tidak boleh kosong',
                'city.required' => 'Kota tidak boleh kosong',
                'grade.required' => 'Grade tidak boleh kosong',
                'pic.required' => 'PIC tidak boleh kosong',
                'position.required' => 'Posisi tidak boleh kosong',
                'phone_number.required' => 'Nomor Telepon tidak boleh kosong',
                'relation.required' => 'Relasi tidak boleh kosong',
                'mou.required' => 'MOU tidak boleh kosong',
            ],
        );

        $data = [
            // 'series' => date('Ymdhis'),
            'title' => $request->input('title'),
            'company_name' => $request->input('company_name'),
            'company_type' => $request->input('company_type'),
            'email' => $request->input('email'),
            'sector' => $request->input('sector'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'grade' => $request->input('grade'),
            'pic' => $request->input('pic'),
            'position' => $request->input('position'),
            'phone_number' => $request->input('phone_number'),
            'relation' => $request->input('relation'),
            'mou' => $request->input('mou'),
            'kode_pos' => $request->input('kode_pos'),
            'fax' => $request->input('fax'),
        ];

        $company = Company::findOrFail($id);

        if ($company) {
            $company->update($data);
            return redirect()
                ->route('company.index')
                ->with('message', 'Data Perusahaan Sudah diupdate');
        } else {
            return redirect()
                ->route('company.index')
                ->with('error', 'Data Perusahaan tidak ditemukan');
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
        $company = Company::findOrFail($id);
        $company->delete();
        return back()->with('message_delete','Data Perusahaan Sudah dihapus');
    }

    public function getcompany($id)
    {
        $company = Company::where('code_company', $id)->first();

        return response()->json(['company' => $company]);
    }
}
