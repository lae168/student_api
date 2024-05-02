<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'api' middleware group. Make something great!
|
*/

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get( '/students', [ StudentController::class, 'index' ] );
Route::get( '/students/{student}', [ StudentController::class, 'show' ] );
Route::post( '/students', [ StudentController::class, 'store' ] );
Route::put( '/students/{student}', [ StudentController::class, 'update' ] );
Route::delete( '/students/{student}', [ StudentController::class, 'destroy' ] );
