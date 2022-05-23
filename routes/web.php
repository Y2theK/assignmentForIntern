<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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
//redirect to students route
Route::redirect('/', '/students');

Route::prefix('students/')->as('students.')->group(function () {
    Route::get('/', [StudentController::class,'index'])->name('list');
    Route::get('/register', [StudentController::class,'register'])->name('register');
    Route::post('/register', [StudentController::class,'store'])->name('register');
});
