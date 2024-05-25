<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        $major = Major::all();
        // $company = Company::where('id', $id)->get();
        // $company = Company::where('id', $id)->first();
        return view('major')->with([
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
                'major' => 'required',
            ],
            [
                'major.required' => 'Jurusan tidak boleh kosong',
            ],
        );

        $major = [
            'major' => $request->input('major'),
        ];

        Major::create($major);

        // return back('company.index')->with('message', 'Data Type Sudah ditambahkan');
        return redirect()
            ->route('major.index')
            ->with('message', 'Data Jurusan Sudah ditambahkan');
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
        $request->validate(
            [
                'major' => 'required',
            ],
            [
                'major.required' => 'Jurusan tidak boleh kosong',
            ],
        );

        $data = [
            'major' => $request->input('major'),
        ];

        $major = Major::findOrFail($id);

        if ($major) {
            $major->update($data);
            return redirect()
                ->route('major.index')
                ->with('message', 'Data Jurusan Sudah diupdate');
        } else {
            return redirect()
                ->route('major.index')
                ->with('error', 'Data Jurusan tidak ditemukan');
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
        $major = Major::findOrFail($id);
        $major->delete();
        return back()->with('message_delete','Data Jurusan Sudah dihapus');
    }
}
