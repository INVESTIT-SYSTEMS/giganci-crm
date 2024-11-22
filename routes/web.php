<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PotentialStudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('main');
});


Route::resource('addingPotential', PotentialStudentController::class);
Route::get('/potential', [PotentialStudentController::class, 'showPotential'])->name('pstudent.index');
Route::get('/AddPotentialStudent', [PotentialStudentController::class, 'index']);

Route::get('/wpteacher', function () {
    return view('wpteacher');
});

Route::get('/wpgroup', function () {
    return view('wpgroup');
});

Route::get('/wplocation', function () {
    return view('wplocation');
});

Route::get('/main', function () {
    return view('main');
});


Route::resource('TeacherController_routes', TeacherController::class);
Route::get('/teacher', [TeacherController::class,'TeachersList'])->name('wpteacher');

Route::resource('StudentController_routes', StudentController::class);
Route::get('/student', [StudentController::class,'StudentList'])->name('wpstudent');

