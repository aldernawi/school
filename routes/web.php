<?php

use App\Http\Controllers\teacherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//teacher
Route::group(['middleware' => ['auth']], function () {
Route::get('/teacher', [App\Http\Controllers\teacherController::class, 'index'])->name('teacher');

Route::post('/teacher/store', [App\Http\Controllers\teacherController::class, 'store'])->name('teacher.store');


Route::post('/teacher/{id}/update', [App\Http\Controllers\teacherController::class, 'update'])->name('teacher.update');

Route::delete('/teacher/{id}', [App\Http\Controllers\teacherController::class, 'destroy'])->name('teacher.destroy');

Route::get('/class', [App\Http\Controllers\ClassController::class, 'index'])->name('class');

Route::post('/class/store', [App\Http\Controllers\ClassController::class, 'store'])->name('class.store');

Route::post('/class/{id}/update', [App\Http\Controllers\ClassController::class, 'update'])->name('class.update');

Route::delete('/class/{id}', [App\Http\Controllers\ClassController::class, 'destroy'])->name('class.destroy');


Route::get('/Student', [App\Http\Controllers\UserController::class, 'student'])->name('student');


Route::get('/admin', [App\Http\Controllers\UserController::class, 'admin'])->name('admin');


Route::get('/users', [App\Http\Controllers\UserController::class, 'admin'])->name('users');
Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');

Route::Post('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');


Route::get('/quizzes', [App\Http\Controllers\quizzesController::class, 'index'])->name('quizzes');

Route::get('create-quiz', [App\Http\Controllers\quizzesController::class, 'create'])->name('create-quiz');

Route::get('/show-quiz/{id}', [App\Http\Controllers\quizzesController::class, 'show'])->name('show-quiz');

Route::post('/save-quiz', [App\Http\Controllers\quizzesController::class, 'store'])->name('quizzes.store');






Route::get('/teacher/classes', [teacherController::class, 'showClasses'])->name('teacher.classes');
Route::get('/teacher/class/{classId}/students', [teacherController::class, 'showStudentsInClass'])->name('class.students');

Route::get('/studentsExam', [App\Http\Controllers\HomeController::class, 'studentsExam'])->name('studentsExam');

});