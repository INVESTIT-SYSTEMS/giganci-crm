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


Route::resource('potentialStudents', PotentialStudentController::class);

Route::resource('groups', GroupController::class);

Route::resource('locations', LocationController::class);

Route::resource('teachers', TeacherController::class);

Route::resource('students', StudentController::class);

Route::post('/message', [StudentController::class, 'message'])->name('message.index');

Route::get('/moveStudent/{studentData}', [StudentController::class, 'moveStudent'])->name('moveStudent.index');


//Perla
Route::get('/login', function () {
    return view('wplogin');
});
