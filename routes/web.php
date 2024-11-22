<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PotentialStudentController;
use App\Http\Controllers\TeacherController;
Route::get('/', function () {
    return view('main');
});

Route::get('/wpstudent', function () {
    return view('wpstudent');
});

Route::get('/wppotential', function () {
    return view('wppotential');
});

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


Route::resource('PotentialStudent_routes', PotentialStudentController::class);
Route::resource('TeacherController_routes', TeacherController::class);
