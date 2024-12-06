<?php

use App\Http\Controllers\MailController;
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

Route::get('/message/Student', [MailController::class, 'messageStudent'])->name('messageStudent.index');
Route::get('/message/PotentialStudent', [MailController::class, 'messagePotentialStudent'])->name('messagePotentialStudent.index');
Route::get('/message/Group', [MailController::class, 'messageGroup'])->name('messageGroup.index');

Route::get('/moveStudent/{studentData}', [StudentController::class, 'moveStudent'])->name('moveStudent.index');

Route::get('/send-mail', [MailController::class, 'index'])->name('mail.send');

Route::get('/addStudentInGroup', [GroupController::class, 'ShowGroups'])->name('showGroups');


//Perla t gej
Route::get('/login', function () {
    return view('wplogin');
});
