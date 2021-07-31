<?php

use App\Http\Controllers\TeacherController;
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

Route::get('/', [TeacherController::class, 'index']) -> name('teacher-index');
Route::get('teacher/show', [TeacherController::class, 'getData']);
Route::post('teacher/add', [TeacherController::class, 'addData']);
Route::get('teacher/edit/{id}', [TeacherController::class, 'editData']);
Route::post('teacher/update/{id}', [TeacherController::class, 'updateData']);
Route::get('teacher/delete/{id}', [TeacherController::class, 'deleteData']);
