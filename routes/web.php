<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('/users', \App\Http\Controllers\Admin\UsersController::class);
        Route::resource('users.sessions', \App\Http\Controllers\Admin\UserSessionsController::class);
        Route::resource('/courses', \App\Http\Controllers\Admin\CourseController::class);
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
