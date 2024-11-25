<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PotentialStudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GroupController;

Route::get('/', function () {
    return view('main');
});


Route::resource('addPStudent', PotentialStudentController::class);
Route::get('/potential', [PotentialStudentController::class, 'PotentialList'])->name('pStudent.index');
Route::get('/AddPotentialStudent', [PotentialStudentController::class, 'index']);


Route::resource('addGroup', GroupController::class);
//Route::get('/wpgroup', function () {
//
//});

Route::get('/wplocation', function () {
    return view('wplocation');
});

Route::get('/main', function () {
    return view('main');
});


Route::resource('addTeacher', TeacherController::class);
Route::get('/teacher', [TeacherController::class,'TeachersList'])->name('teacher.index');

Route::resource('addStudent', StudentController::class);
Route::get('/student', [StudentController::class,'StudentList'])->name('wpstudent');

