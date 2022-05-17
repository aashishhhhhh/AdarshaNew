<?php

use App\Http\Controllers\AboutUsController;
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
Route::get('deleteStaff',[AboutUsController::class,'deleteStaff'])->name('delete-staff');
Route::get('staffData',[AboutUsController::class,'getStaffData'])->name('get-staff-data');
Route::get('alumni-data',[AboutUsController::class,'getAlumniData'])->name('get-alumni-data');