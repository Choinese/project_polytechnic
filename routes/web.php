<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
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
})->name('home');;

Route::get('/data', [StudentController::class, 'index']);

Route::delete("/student/delete/{id}", [StudentController::class, "delete"])->name('student/delete');

Route::patch("/student/scoreEdit/{id}", [StudentController::class, "scoreEdit"])->name('student/scoreEdit');


Route::get('/data', [PagesController::class, 'index']);

Route::post('/uploadFile', [PagesController::class, 'uploadFile']);

// Guest
Route::middleware(['guest'])->group(function () {

    // Login
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);

    // Register
    Route::get('/register', [AuthController::class, 'getRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'postRegister']);


});

// Authenticated
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [AuthController::class, 'postLogout'])->name('logout');

});