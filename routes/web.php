<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data', [StudentController::class, 'index']);

Route::delete("/student/delete/{id}", [StudentController::class, "delete"])->name('student/delete');

Route::patch("/student/scoreEdit/{id}", [StudentController::class, "scoreEdit"])->name('student/scoreEdit');


Route::get('/data', [PagesController::class, 'index']);

Route::post('/uploadFile', [PagesController::class, 'uploadFile']);

