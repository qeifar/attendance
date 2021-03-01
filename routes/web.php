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
    Route::get('/course/new', [App\Http\Controllers\CourseController::class, 'new'])->name('course.new');
    Route::post('/course/create', [App\Http\Controllers\CourseController::class, 'new'])->name('course.create');

    // USER
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
});