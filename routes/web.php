<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PotentialStudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\groupViewController;




Route::get('/main', function () {
    return view('main');
})->name('main.index')->middleware('admin');


Route::resource('potentialStudents', PotentialStudentController::class);

Route::resource('groups', GroupController::class);

Route::resource('locations', LocationController::class);

Route::resource('teachers', TeacherController::class);

Route::resource('students', StudentController::class);

Route::resource('groupView', groupViewController::class);



Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::get('/', [LoginController::class, 'store'])->name('login.store');
Route::get('/find-number', [StudentController::class, 'FindNumber'])->name('FindNumber');




Route::get('/message/Student', [MailController::class, 'messageStudent'])->name('messageStudent.index');
Route::get('/message/PotentialStudent', [MailController::class, 'messagePotentialStudent'])->name('messagePotentialStudent.index');
Route::get('/message/Group', [MailController::class, 'messageGroup'])->name('messageGroup.index');

Route::get('/moveStudent/{studentData}', [StudentController::class, 'moveStudent'])->name('moveStudent.index');

Route::get('/send-mail/Student', [MailController::class, 'sendStudent'])->name('mailStudent.send');
Route::get('/send-mail/PotentialStudent', [MailController::class, 'sendPotentialStudent'])->name('mailPotentialStudent.send');


//Route::get('/', [StudentController::class, 'Login'])->name('login');


//Perla t gej



