<?php

use App\Http\Controllers\API\ClassesAPIController;
use App\Http\Controllers\API\CompanyAPIController;
use App\Http\Controllers\API\DetailAPIController;
use App\Http\Controllers\API\FollowupAPIController;
use App\Http\Controllers\API\MajorAPIController;
use App\Http\Controllers\API\RecruitmentAPIController;
use App\Http\Controllers\API\StudentAPIController;
use App\Http\Controllers\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/company', [CompanyAPIController::class, 'get_all'])->name('company.get');
Route::get('/major', [MajorAPIController::class, 'get_all'])->name('major.get');
Route::get('/classes', [ClassesAPIController::class, 'get_all'])->name('classes.get');
Route::get('/student', [StudentAPIController::class, 'get_all'])->name('student.get');
Route::get('/followup', [FollowupAPIController::class, 'get_all'])->name('followup.get');
Route::get('/recruitment', [RecruitmentAPIController::class, 'get_all'])->name('recruitment.get');
Route::get('/recruitment/{id}', [RecruitmentAPIController::class, 'get_id'])->name('recruitment.get');
Route::get('/recruitment/{id}', [RecruitmentAPIController::class, 'get_code'])->name('recruitment.get');
// Route::get('/recruitment/{id}/{code}', [RecruitmentAPIController::class, 'get_idcode'])->name('recruitment.get');
Route::get('/detail/{id}', [DetailAPIController::class, 'get_id'])->name('detail.get');
Route::get('/recruitment', [RecruitmentAPIController::class, 'get_report'])->name('detail.get');
Route::get('/detail', [DetailAPIController::class, 'get_all'])->name('detail.get');
Route::get('/followup', [FollowupAPIController::class, 'get_report'])->name('detail.get');
Route::get('/mou', [CompanyAPIController::class, 'get_report'])->name('detail.get');
Route::get('/detail/{id}/{code}', [DetailAPIController::class, 'get_code'])->name('detail.get');
Route::get('/detail/{id}/{status}', [DetailAPIController::class, 'get_status'])->name('detail.get');
Route::get('/followup/{id}', [FollowupAPIController::class, 'get_id'])->name('followup.get');
