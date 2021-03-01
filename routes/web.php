<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // DASHBOARD
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

    // COURSE
    Route::get('/course', [App\Http\Controllers\CourseController::class, 'index'])->name('course.index');
    Route::get('/course/{id}', [App\Http\Controllers\CourseController::class, 'show'])->name('course.show');
    Route::get('/course/new', [App\Http\Controllers\CourseController::class, 'new'])->name('course.new');
    Route::post('/course/create', [App\Http\Controllers\CourseController::class, 'create'])->name('course.create');
    Route::post('/course/delete/{id}', [App\Http\Controllers\CourseController::class, 'delete'])->name('course.delete');

    // USER
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/user/new', [App\Http\Controllers\UserController::class, 'new'])->name('user.new');
    Route::post('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::post('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

    // CLASS
    Route::get('/class', [App\Http\Controllers\ClassController::class, 'index'])->name('class.index');
    Route::get('/class/new', [App\Http\Controllers\ClassController::class, 'new'])->name('class.new');
    Route::post('/class/create', [App\Http\Controllers\ClassController::class, 'create'])->name('class.create');
});