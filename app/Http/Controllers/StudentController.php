<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Company;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
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
        return view('student')->with([
            'company' => $company,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::all();
        // $company = Company::where('id', $id)->get();
        // $company = Company::where('id', $id)->first();
        return view('student.add')->with([
            'classes' => $classes,
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
                'nim' => 'required',
                'student_name' => 'required',
                'class_name' => 'required',
                'gender' => 'required',
                'phone_number' => 'required',
                'class_year' => 'required',
            ],
            [
                'nim.required' => 'NIM tidak boleh kosong',
                'student_name.required' => 'Nama tidak boleh kosong',
                'class_name.required' => 'Kelas tidak boleh kosong',
                'gender.required' => 'Jenis Kelamin tidak boleh kosong',
                'phone_number.required' => 'Nomor Handphone tidak boleh kosong',
                'class_year.required' => 'Tahun Angkatan tidak boleh kosong',
            ],
        );

        $repositories = [
            'nim' => $request->input('nim'),
            'student_name' => $request->input('student_name'),
            'id_class' => $request->input('class_name'),
            'financial_status' => $request->input('financial_status'),
            'academic_counselors' => $request->input('academic_counselors'),
            'request_recruitment' => $request->input('request_recruitment'),
            'gender' => $request->input('gender'),
            'place_of_birth' => $request->input('place_of_birth'),
            'date_of_birth' => $request->input('date_of_birth'),
            'age' => $request->input('age'),
            'hamlet' => $request->input('hamlet'),
            'village' => $request->input('village'),
            'city' => $request->input('city'),
            'phone_number' => $request->input('phone_number'),
            'parents_name' => $request->input('parents_name'),
            'parents_job' => $request->input('parents_job'),
            'parents_phone' => $request->input('parents_phone'),
            'competence_test1' => $request->input('competence_test1'),
            'competence_test2' => $request->input('competence_test2'),
            'competence_test3' => $request->input('competence_test3'),
            'competence_test4' => $request->input('competence_test4'),
            'high_school' => $request->input('high_school'),
            'major_high_school' => $request->input('major_high_school'),
            'class_year' => $request->input('class_year'),
            'graduation_year' => $request->input('graduation_year'),
            'link_berkas' => $request->input('link_berkas'),
        ];

        Student::create($repositories);

        // return back('company.index')->with('message', 'Data Type Sudah ditambahkan');
        return redirect()
            ->route('student.index')
            ->with('message', 'Data Student Sudah ditambahkan');
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
        $classes = Classes::all();
        // $student = Student::where('nim', $id)->get();
        $student = Student::where('nim', $id)->first();
        return view('student.edit')->with([
            'student' => $student,
            'classes' => $classes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $request->validate(
            [
                'nim' => 'required',
                'student_name' => 'required',
                'class_name' => 'required',
                'gender' => 'required',
                'phone_number' => 'required',
                'class_year' => 'required',
            ],
            [
                'nim.required' => 'NIM tidak boleh kosong',
                'student_name.required' => 'Nama tidak boleh kosong',
                'class_name.required' => 'Kelas tidak boleh kosong',
                'gender.required' => 'Jenis Kelamin tidak boleh kosong',
                'phone_number.required' => 'Nomor Handphone tidak boleh kosong',
                'class_year.required' => 'Tahun Angkatan tidak boleh kosong',
            ],
        );

        $data = [
            'nim' => $request->input('nim'),
            'student_name' => $request->input('student_name'),
            'id_class' => $request->input('class_name'),
            'financial_status' => $request->input('financial_status'),
            'academic_counselors' => $request->input('academic_counselors'),
            'request_recruitment' => $request->input('request_recruitment'),
            'gender' => $request->input('gender'),
            'place_of_birth' => $request->input('place_of_birth'),
            'date_of_birth' => $request->input('date_of_birth'),
            'age' => $request->input('age'),
            'hamlet' => $request->input('hamlet'),
            'village' => $request->input('village'),
            'city' => $request->input('city'),
            'phone_number' => $request->input('phone_number'),
            'parents_name' => $request->input('parents_name'),
            'parents_job' => $request->input('parents_job'),
            'parents_phone' => $request->input('parents_phone'),
            'competence_test1' => $request->input('competence_test1'),
            'competence_test2' => $request->input('competence_test2'),
            'competence_test3' => $request->input('competence_test3'),
            'competence_test4' => $request->input('competence_test4'),
            'high_school' => $request->input('high_school'),
            'major_high_school' => $request->input('major_high_school'),
            'class_year' => $request->input('class_year'),
            'graduation_year' => $request->input('graduation_year'),
            'link_berkas' => $request->input('link_berkas'),
        ];

        $student = Student::where('nim', $nim)->first();

        if ($student) {
            $student->update($data);
            return redirect()
                ->route('student.index')
                ->with('message', 'Data Mahasiswa Sudah diupdate');
        } else {
            return redirect()
                ->route('student.index')
                ->with('error', 'Data Mahasiswa tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $student = Student::findOrFail($nim);
        $student->delete();
        return back()->with('message_delete','Data Mahasiswa Sudah dihapus');
    }

    public function getprodi($id)
    {
        $major = Major::where('id', $id)->first();

        return response()->json(['major' => $major]);
    }

    public function getstudent($id)
    {
        $student = Student::with('classes.major')->where('nim', $id)->first();

        return response()->json(['student' => $student]);
    }
}
