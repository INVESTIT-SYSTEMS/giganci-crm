<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PotentialStudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LocationController;

Route::get('/', function () {
    return view('main');
});
Route::get('/main', function () {
    return view('main');
})->name('main.index');


Route::resource('PotentialStudent', PotentialStudentController::class);

Route::resource('Group', GroupController::class);

Route::resource('Location', LocationController::class);




Route::resource('teachers', TeacherController::class);
Route::get('/teacher', [TeacherController::class,'create'])->name('teacher.index');

Route::resource('students', StudentController::class);
Route::get('/student', [StudentController::class,'create'])->name('student.index');

