<?php

use App\Http\Controllers\Student\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'student'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('student.login');
    Route::post('login', [LoginController::class, 'login'])->name('student.login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('student.logout');
    Route::group(['middleware' => ['auth:student']], function () {
        Route::get('/', function () {
            return view('student.dashboard');
        })->name('student.dashboard');
    });
});
