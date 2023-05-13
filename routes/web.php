<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\student\StudentController;


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

Route::get('/', function() {return view('welcome');});
Route::prefix('admin')->group(function(){
    Route::get('dashboard',[DashboardController::class,'adminDashboard'])->name('admin#dashboard');

    // student routes
    Route::get('student',[StudentController::class,'student'])->name('admin#student');
    Route::get('students-list',[StudentController::class,'studentsList'])->name('admin#studentslist');
    Route::get('student/add',[StudentController::class,'addStudentPage'])->name('admin#addStudentPage');
    Route::post('student/add',[StudentController::class,'addStudent'])->name('admin#addStudent');
    Route::get('student/edit/{id}',[StudentController::class,'editStudent'])->name('admin#editStudent');
    Route::post('student/update',[StudentController::class,'updateStudent'])->name('admin#updateStudent');
    Route::get('student/grade',[GradeController::class,'grade'])->name('admin#grade');
    Route::post('student/grade/add',[GradeController::class,'addGrade'])->name('admin#addgrade');
    Route::get('student/grade/remove/{id}',[GradeController::class,'removeGrade'])->name('admin#gradeRemove');
    Route::get('student/details/{id}',[StudentController::class,'studentDetails'])->name('admin#studentDetails');

    Route::prefix('teacher')->group(function(){
        Route::get('list',[StudentController::class,'teacher'])->name('admin#teacher');
    });

});

