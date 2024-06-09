<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FollowupController;
use App\Http\Controllers\GrafikRecruitmentController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\ReportFollowupController;
use App\Http\Controllers\ReportMouController;
use App\Http\Controllers\ReportRecruitmentController;
use App\Http\Controllers\ReportRekapitulasiController;
use App\Http\Controllers\SerapanController;
use App\Http\Controllers\StudentController;
use App\Models\Company;
use App\Models\Detail;
use App\Models\GrafikPerusahaan;
use App\Models\GrafiRecDashboard;
use App\Models\Recruitment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $data = [
        'labels' => ['< 10 Hari', '10 - 20 Hari', '> 20 Hari'],
        'data' => [30, 40, 30],
    ];
    $company = Company::all();
    $sectors = GrafiRecDashboard::query()->pluck('Bidang')->toArray();
    $rec = GrafiRecDashboard::query()->pluck('Jumlah_Rekrutmen')->toArray();
    $posisi = GrafikPerusahaan::query()->where('id_company', Auth::user()->id_company)->pluck('position_required')->toArray();
    $lolos = GrafikPerusahaan::query()->where('id_company', Auth::user()->id_company)->pluck('passed_candidates')->toArray();
    // $posisi = DB::table('grafik_perusahaan_month')
    //         ->select('position_required')
    //         ->groupBy('position_required')
    //         ->pluck('position_required')
    //         ->toArray();


    // $posisi = Recruitment::where('id_company', Auth::user()->id_company)
    //     ->whereMonth('created_at', Carbon::now()->month)
    //     ->whereYear('created_at', Carbon::now()->year)
    //     ->pluck('position_required')
    //     ->toArray();
    // $hasilRec = Recruitment::where('id_company', Auth::user()->id_company)
    //     ->left
    //     ->pluck('result')
    //     ->where('result','LULUS')
    //     ->whereMonth('created_at', Carbon::now()->month)
    //     ->toArray();

    $historyapply = Detail::select('detail.*', 'company.company_name', 'company.code_company', 'recruitment.code', 'recruitment.id_company', 'recruitment.position_required')
        ->join(
            DB::raw('(SELECT code, MAX(created_at) as max_created_at
              FROM detail
              WHERE nim = "' . Auth::user()->nim . '"
              GROUP BY code) as latest'),
            function ($join) {
                $join->on('detail.code', '=', 'latest.code')
                    ->on('detail.created_at', '=', 'latest.max_created_at');
            }
        )
        ->join('recruitment', 'detail.code', '=', 'recruitment.code')
        ->join('company', 'company.code_company', '=', 'recruitment.id_company')
        ->orderBy('detail.created_at', 'DESC')
        ->orderBy('detail.code', 'ASC')
        ->get();


    return view('dashboard', compact('data', 'company', 'sectors', 'rec', 'historyapply', 'posisi', 'lolos'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     $data = [
//         'labels' => ['< 10 Hari', '10 - 20 Hari', '> 20 Hari'],
//         'data' => [30, 40, 30],
//     ];
//     $company = Company::all();
//     $companyRecruitments = DB::table('recruitment')
//         ->join('company', 'recruitment.id_company', '=', 'company.id')
//         ->select('company.sector', DB::raw('SUM(recruitment.id) as total_recruitment'))
//         ->groupBy('company.sector')
//         ->get();

//     $sectors = $companyRecruitments->pluck('sector')->toArray();
//     $recruitmentCounts = $companyRecruitments->pluck('total_recruitment')->toArray();

//     return view('dashboard', compact('data', 'sectors', 'recruitmentCounts','company'));
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('dashboard', CompanyController::class)->middleware(['auth'])->with([
//     'data' => [
//         'labels' => ['< 10 Hari', '10 - 20 Hari', '> 20 Hari'],
//         'data' => [30, 40, 30],
//     ]
// ]);

Route::resource('company', CompanyController::class)->middleware(['auth']);
Route::resource('major', MajorController::class)->middleware(['auth']);
Route::resource('classes', ClassesController::class)->middleware(['auth']);
Route::resource('student', StudentController::class)->middleware(['auth']);
Route::resource('followup', FollowupController::class)->middleware(['auth']);
Route::resource('recruitment', RecruitmentController::class)->middleware(['auth']);
Route::resource('detail', DetailController::class)->middleware(['auth']);
Route::resource('candidat', CandidatController::class)->middleware(['auth']);
Route::resource('interview', InterviewController::class)->middleware(['auth']);
Route::resource('hasil', HasilController::class)->middleware(['auth']);
Route::resource('reportRecruitment', ReportRecruitmentController::class)->middleware(['auth']);
Route::resource('reportFollowup', ReportFollowupController::class)->middleware(['auth']);
Route::resource('reportMou', ReportMouController::class)->middleware(['auth']);
Route::resource('reportRekapitulasi', ReportRekapitulasiController::class)->middleware(['auth']);
Route::resource('grafikRecruitment', GrafikRecruitmentController::class)->middleware(['auth']);
Route::resource('serapan', SerapanController::class)->middleware(['auth']);
Route::resource('job', JobController::class)->middleware(['auth']);

Route::get('/student/prodi/{id}', [StudentController::class, 'getprodi'])->middleware(['auth']);
Route::get('/company/company_name/{id}', [CompanyController::class, 'getcompany'])->middleware(['auth']);
Route::get('/student/student_name/{id}', [StudentController::class, 'getstudent'])->middleware(['auth']);
Route::get('/candidat/{id}/{code}', [CandidatController::class, 'show'])->name('candidat.show');
Route::post('/candidat/{id}/interview', [CandidatController::class, 'interview'])->name('candidat.interview');
Route::post('/candidat/{id}/tolak', [CandidatController::class, 'tolak'])->name('candidat.tolak');
Route::get('/interview/{id}/{code}', [InterviewController::class, 'show'])->name('interview.show');
Route::post('/interview/{id}/terima', [InterviewController::class, 'terima'])->name('interview.terima');
Route::post('/interview/{id}/tolak', [InterviewController::class, 'tolak'])->name('interview.tolak');



Route::get('/master', function () {
    return view('master');
})->name('master');

require __DIR__ . '/auth.php';
