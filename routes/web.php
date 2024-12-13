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
use App\Http\Middleware\Admin;




Route::get('/main', function () {
    return view('main');
})->name('main.index')->middleware('admin:admin');


Route::resource('potentialStudents', PotentialStudentController::class)->middleware('admin:admin');

Route::resource('groups', GroupController::class)->middleware('admin:admin');

Route::resource('locations', LocationController::class)->middleware('admin:admin');

Route::resource('teachers', TeacherController::class)->middleware('admin:admin');

Route::resource('students', StudentController::class)->middleware('admin:admin');

Route::resource('groupView', groupViewController::class)->middleware('admin:admin');


Route::get('/', [LoginController::class, 'index'])
    ->name('login.index');

Route::post('/', [LoginController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [LoginController::class, 'logout'])
    ->name('login.logout');

Route::get('/find-number', [StudentController::class, 'FindNumber'])
    ->name('FindNumber')
    ->middleware('admin:admin');

Route::get('/message/Student', [MailController::class, 'messageStudent'])
    ->name('messageStudent.index')
    ->middleware('admin:admin');

Route::get('/message/PotentialStudent', [MailController::class, 'messagePotentialStudent'])
    ->name('messagePotentialStudent.index')
    ->middleware('admin:admin');

Route::get('/message/Group', [MailController::class, 'messageGroup'])
    ->name('messageGroup.index')
    ->middleware('admin:admin');

Route::get('/moveStudent/{studentData}', [StudentController::class, 'moveStudent'])
    ->name('moveStudent.index')
    ->middleware('admin:admin');

Route::get('/send-mail/Student', [MailController::class, 'sendStudent'])
    ->name('mailStudent.send')
    ->middleware('admin:admin');

Route::get('/send-mail/PotentialStudent', [MailController::class, 'sendPotentialStudent'])
    ->name('mailPotentialStudent.send')
    ->middleware('admin:admin');



















//Perla t gej



