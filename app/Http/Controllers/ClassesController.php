<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Company;
use App\Models\Major;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::all();
        $company = Company::all();
        $major = Major::all();
        // dd($classes);
        // $company = Company::where('id', $id)->get();
        // $company = Company::where('id', $id)->first();
        return view('classes')->with([
            'classes' => $classes,
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
                'classes_name' => 'required',
            ],
            [
                'major.required' => 'Prodi tidak boleh kosong',
                'classes_name.required' => 'Nama Kelas tidak boleh kosong',
            ],
        );

        $repositories = [
            'id_major' => $request->input('major'),
            'class_name' => $request->input('classes_name'),
        ];

        Classes::create($repositories);

        // return back('company.index')->with('message', 'Data Type Sudah ditambahkan');
        return redirect()
            ->route('classes.index')
            ->with('message', 'Data Kelas Sudah ditambahkan');
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
                'id_major' => 'required',
                'class_name' => 'required',
            ],
            [
                'id_major.required' => 'Jurusan tidak boleh kosong',
                'class_name.required' => 'Jurusan tidak boleh kosong',
            ],
        );

        $data = [
            'id_major' => $request->input('id_major'),
            'class_name' => $request->input('class_name'),
        ];

        $classes = Classes::findOrFail($id);

        if ($classes) {
            $classes->update($data);
            return redirect()
                ->route('classes.index')
                ->with('message', 'Data Kelas Sudah diupdate');
        } else {
            return redirect()
                ->route('classes.index')
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
        $classes = Classes::findOrFail($id);
        $classes->delete();
        return back()->with('message_delete','Data Kelas Sudah dihapus');
    }
}
