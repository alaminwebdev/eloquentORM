<?php

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
})->name('home');

Route::get('add', [StudentController::class, 'addStudent']);
Route::get('view', [StudentController::class, 'viewStudent'])->name('getStudent');
Route::get('update/{id}/{name}', [StudentController::class, 'updateStudent']);
Route::get('delete/{id}', [StudentController::class , 'deleteStudent']);


