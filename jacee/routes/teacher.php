<?php

use App\Http\Controllers\Teacher\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'teacher'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('teacher.login');
    Route::post('login', [LoginController::class, 'login'])->name('teacher.login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('teacher.logout');
    Route::group(['middleware' => ['auth:teacher']], function () {
        Route::get('/', function () {
            return view('teacher.dashboard');
        })->name('teacher.dashboard');
    });
});
