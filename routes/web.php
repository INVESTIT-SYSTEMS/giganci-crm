<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PotentialStudentController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('PotentialStudent_routes', PotentialStudentController::class);
