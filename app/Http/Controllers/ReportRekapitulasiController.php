<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class ReportRekapitulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $major = Major::all();
        $mi = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('id_major', 1)
            ->get();
        $mkp = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('id_major', 2)
            ->get();
        $mp = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('id_major', 3)
            ->get();
        $bermasalah_mi = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 1)
            ->where(function ($query) {
                $query->where('student.trial_status', 'GAGAL')
                    ->orWhereNull('student.trial_status');
            })
            ->get();
        $bermasalah_mkp = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 2)
            ->where(function ($query) {
                $query->where('student.trial_status', 'GAGAL')
                    ->orWhereNull('student.trial_status');
            })
            ->get();
        $bermasalah_mp = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 3)
            ->where(function ($query) {
                $query->where('student.trial_status', 'GAGAL')
                    ->orWhereNull('student.trial_status');
            })
            ->get();
        $ipk_mi = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 1)
            ->where('ipk', '>=', 3)
            ->get();
        $ipk_mkp = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 2)
            ->where('ipk', '>=', 3)
            ->get();
        $ipk_mp = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 3)
            ->where('ipk', '>=', 3)
            ->get();
        $kki_mi = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 1)
            ->where('trial_status', 'KKI')
            ->get();
        $kki_mkp = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 2)
            ->where('trial_status', 'KKI')
            ->get();
        $kki_mp = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 3)
            ->where('trial_status', 'KKI')
            ->get();
        $kerja_mi = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 1)
            ->where('trial_status', 'KERJA')
            ->get();
        $kerja_mkp = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 2)
            ->where('trial_status', 'KERJA')
            ->get();
        $kerja_mp = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 3)
            ->where('trial_status', 'KERJA')
            ->get();
        $wirausaha_mi = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 1)
            ->where('trial_status', 'WIRAUSAHA')
            ->get();
        $wirausaha_mkp = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 2)
            ->where('trial_status', 'WIRAUSAHA')
            ->get();
            $wirausaha_mp = Student::join('classes', 'student.id_class', '=', 'classes.id')
            ->join('major', 'classes.id_major', '=', 'major.id')
            ->select('*')
            ->where('classes.id_major', 3)
            ->where('trial_status', 'WIRAUSAHA')
            ->get();
        return view('rekapitulasi.rekapitulasi')->with([
            'major' => $major,
            'mi' => $mi,
            'mkp' => $mkp,
            'mp' => $mp,
            'bermasalah_mi' => $bermasalah_mi,
            'bermasalah_mkp' => $bermasalah_mkp,
            'bermasalah_mp' => $bermasalah_mp,
            'ipk_mi' => $ipk_mi,
            'ipk_mkp' => $ipk_mkp,
            'ipk_mp' => $ipk_mp,
            'kki_mi' => $kki_mi,
            'kki_mkp' => $kki_mkp,
            'kki_mp' => $kki_mp,
            'kerja_mi' => $kerja_mi,
            'kerja_mkp' => $kerja_mkp,
            'kerja_mp' => $kerja_mp,
            'wirausaha_mi' => $wirausaha_mi,
            'wirausaha_mkp' => $wirausaha_mkp,
            'wirausaha_mp' => $wirausaha_mp,
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
