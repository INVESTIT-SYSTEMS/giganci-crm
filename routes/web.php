<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PotentialStudentController;
use App\Http\Controllers\TeacherController;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('PotentialStudent_routes', PotentialStudentController::class);
Route::resource('TeacherController_routes', TeacherController::class);
