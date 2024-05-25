<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FollowupController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\StudentController;
use App\Models\Company;
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
    return view('dashboard', compact('data', 'company'));
})->middleware(['auth', 'verified'])->name('dashboard');

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

Route::get('/student/prodi/{id}', [StudentController::class, 'getprodi'])->middleware(['auth']);
Route::get('/company/company_name/{id}', [CompanyController::class, 'getcompany'])->middleware(['auth']);
Route::get('/student/student_name/{id}', [StudentController::class, 'getstudent'])->middleware(['auth']);

Route::get('/master', function () {
    return view('master');
})->name('master');

require __DIR__ . '/auth.php';
