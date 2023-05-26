<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

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

Route::get('enrollments', [EnrollmentController::class, 'index']);
Route::post('enrollments', [EnrollmentController::class, 'store']);
Route::put('enrollments/{enrollment}', [EnrollmentController::class, 'update']);
Route::delete('enrollments/{enrollment}', [EnrollmentController::class, 'destroy']);
