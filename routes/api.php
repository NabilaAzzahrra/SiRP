<?php

use App\Http\Controllers\API\ClassesAPIController;
use App\Http\Controllers\API\CompanyAPIController;
use App\Http\Controllers\API\FollowupAPIController;
use App\Http\Controllers\API\MajorAPIController;
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
Route::get('/followup/{id}', [FollowupAPIController::class, 'get_id'])->name('followup.get');
