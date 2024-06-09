<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Recruitment;
use Cron\MonthField;
use Illuminate\Http\Request;

class GrafikRecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dateStart = request('fromDate', 'all');
        $dateEnd = request('toDate', 'all');

        $dateStart = ($dateStart === 'all') ? null : $dateStart;
        $dateEnd = ($dateEnd === 'all') ? null : $dateEnd;

        $formattedDateStart = $dateStart ? date('d/m/Y', strtotime($dateStart)) : '00/00/0000';
        $formattedDateEnd = $dateEnd ? date('d/m/Y', strtotime($dateEnd)) : '00/00/0000';

        // RECRUITMENT //
        $rec_jan = Recruitment::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 1)
            ->get();
        $rec_feb = Recruitment::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 2)
            ->get();
        $rec_mar = Recruitment::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 3)
            ->get();
        $rec_apr = Recruitment::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 4)
            ->get();
        $rec_mei = Recruitment::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 5)
            ->get();
        $rec_juni = Recruitment::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 6)
            ->get();
        $rec_jul = Recruitment::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 7)
            ->get();
        $rec_ags = Recruitment::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 8)
            ->get();
        $rec_sep = Recruitment::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 9)
            ->get();
        $rec_okt = Recruitment::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 10)
            ->get();
        $rec_nov = Recruitment::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 11)
            ->get();
        $rec_des = Recruitment::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 12)
            ->get();
        // =========== //

        // LOLOS //

        $lol_jan = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 1)
            ->where('result', 'LOLOS')
            ->get();
        $lol_feb = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 2)
            ->where('result', 'LOLOS')
            ->get();
        $lol_mar = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 3)
            ->where('result', 'LOLOS')
            ->get();
        $lol_apr = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 4)
            ->where('result', 'LOLOS')
            ->get();
        $lol_mei = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 5)
            ->where('result', 'LOLOS')
            ->get();
        $lol_juni = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 6)
            ->where('result', 'LOLOS')
            ->get();
        $lol_jul = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 7)
            ->where('result', 'LOLOS')
            ->get();
        $lol_ags = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 8)
            ->where('result', 'LOLOS')
            ->get();
        $lol_sep = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 9)
            ->where('result', 'LOLOS')
            ->get();
        $lol_okt = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 10)
            ->where('result', 'LOLOS')
            ->get();
        $lol_nov = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 11)
            ->where('result', 'LOLOS')
            ->get();
        $lol_des = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 12)
            ->where('result', 'LOLOS')
            ->get();

        // ===== //

        // KANDIDAT //
        $can_jan = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 1)
            ->get();
        $can_feb = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 2)
            ->get();
        $can_mar = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 3)
            ->get();
        $can_apr = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 4)
            ->get();
        $can_mei = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 5)
            ->get();
        $can_juni = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 6)
            ->get();
        $can_jul = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 7)
            ->get();
        $can_ags = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 8)
            ->get();
        $can_sep = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 9)
            ->get();
        $can_okt = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 10)
            ->get();
        $can_nov = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 11)
            ->get();
        $can_des = Detail::whereBetween('created_at', [$dateStart, $dateEnd])
            ->whereMonth('created_at', 12)
            ->get();
        // ======== //

        return view('grafik.index')->with([
            'rec_jan' => $rec_jan,
            'rec_feb' => $rec_feb,
            'rec_mar' => $rec_mar,
            'rec_apr' => $rec_apr,
            'rec_mei' => $rec_mei,
            'rec_juni' => $rec_juni,
            'rec_jul' => $rec_jul,
            'rec_ags' => $rec_ags,
            'rec_sep' => $rec_sep,
            'rec_okt' => $rec_okt,
            'rec_nov' => $rec_nov,
            'rec_des' => $rec_des,

            'lol_jan' => $lol_jan,
            'lol_feb' => $lol_feb,
            'lol_mar' => $lol_mar,
            'lol_apr' => $lol_apr,
            'lol_mei' => $lol_mei,
            'lol_juni' => $lol_juni,
            'lol_jul' => $lol_jul,
            'lol_ags' => $lol_ags,
            'lol_sep' => $lol_sep,
            'lol_okt' => $lol_okt,
            'lol_nov' => $lol_nov,
            'lol_des' => $lol_des,

            'can_jan' => $can_jan,
            'can_feb' => $can_feb,
            'can_mar' => $can_mar,
            'can_apr' => $can_apr,
            'can_mei' => $can_mei,
            'can_juni' => $can_juni,
            'can_jul' => $can_jul,
            'can_ags' => $can_ags,
            'can_sep' => $can_sep,
            'can_okt' => $can_okt,
            'can_nov' => $can_nov,
            'can_des' => $can_des,

            'dateStart' => $formattedDateStart,
            'dateEnd' => $formattedDateEnd,
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
