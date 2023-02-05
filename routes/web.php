<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(CourseController::class)->prefix('courses')->name('courses.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/all', 'all')->name('all');
    Route::get('create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('{course}/show', 'show')->name('show');
    Route::get('{course}/edit', 'edit')->name('edit');
    Route::put('{course}', 'update')->name('update');
    Route::delete('{course}', 'destroy')->name('destroy');
});

Route::controller(EnrollController::class)->prefix('courses/enroll')->name('courses.')->group(function () {
    Route::get('enroll/{course}/create', 'create')->name('enroll.create');
    Route::post('enroll{course}/', 'store')->name('enroll.store');
});
