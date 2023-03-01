<?php

use App\Http\Controllers\CallController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PrioritieController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdminRole;

Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');

Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    /*       Profile        */
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');

    /*       Calls        */
    Route::resource('calls', CallController::class, [
        'names' => [
            'index' => 'calls'
        ],
        'except' => ['show', 'update']
    ]);
    Route::post('calls/{call}', [CallController::class, 'update'])->name('calls.update');
    Route::get('calls/{call}/delete', [CallController::class, 'destroy'])->name('calls.destroy');

    /*       Logout        */
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');


    /*       Admin        */
    Route::group(['middleware' => 'admin'], function () {

        /*       Crud Users        */
        Route::resource('users', UserController::class, [
            'names' => [
                'index' => 'users'
            ],
            'except' => ['show', 'update']
        ]);
        Route::post('users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');

        /*       Priorities        */
        Route::resource('priorities', PrioritieController::class, [
            'names' => [
                'index' => 'priorities'
            ],
            'except' => ['show', 'update']
        ]);
        Route::post('priorities/{priority}', [PrioritieController::class, 'update'])->name('priorities.update');
        Route::get('priorities/{priority}/delete', [PrioritieController::class, 'destroy'])->name('priorities.destroy');

        /*       Status        */
        Route::resource('status', StatusController::class, [
            'names' => [
                'index' => 'status'
            ],
            'except' => ['show', 'update']
        ]);
        Route::post('status/{status}', [StatusController::class, 'update'])->name('status.update');
        Route::get('status/{status}/delete', [StatusController::class, 'destroy'])->name('status.destroy');

    });
});
