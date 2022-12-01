<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ComentarioController;

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

Route::get('/', [UserController::class, 'index'])->name('user.login');

Route::post('/auth', [UserController::class, 'auth'])->name('login')->middleware('access');

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'list'])->name('user.list');
    Route::get('/create', [UserController::class, 'form'])->name('user.create');
    Route::post('/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/remove/{id}', [UserController::class, 'remove'])->where('id', '[0-9]+')->name('user.remove');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('user.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('usuario')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::get('/create', [UsuarioController::class, 'create'])->name('usuario.create');
    Route::post('/store', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::get('/show', [UsuarioController::class, 'show'])->where('id', '[0-9]+')->name('usuario.show');
    Route::get('/edit', [UsuarioController::class, 'edit'])->where('id', '[0-9]+')->name('usuario.edit');
    Route::post('/update', [UsuarioController::class, 'update'])->where('id', '[0-9]+')->name('usuario.update');
    Route::get('/destroy', [UsuarioController::class, 'destroy'])->where('id', '[0-9]+')->name('usuario.destroy');
});

Route::prefix('chamado')->group(function () {
    Route::get('/', [ChamadoController::class, 'index'])->name('chamado.index');
    Route::get('/create', [ChamadoController::class, 'create'])->name('chamado.create');
    Route::post('/store', [ChamadoController::class, 'store'])->name('chamado.store');
    Route::get('/show/{id}', [ChamadoController::class, 'show'])->where('id', '[0-9]+')->name('chamado.show');
    Route::get('/edit', [ChamadoController::class, 'edit'])->where('id', '[0-9]+')->name('chamado.edit');
    Route::post('/update', [ChamadoController::class, 'update'])->where('id', '[0-9]+')->name('chamado.update');
    Route::get('/destroy', [ChamadoController::class, 'destroy'])->where('id', '[0-9]+')->name('chamado.destroy');
});

Route::prefix('comentario')->group(function () {
    Route::get('/', [ComentarioController::class, 'index'])->name('comentario.index');
    Route::get('/create', [ComentarioController::class, 'create'])->name('comentario.create');
    Route::post('/store', [ComentarioController::class, 'store'])->name('comentario.store');
    Route::get('/show', [ComentarioController::class, 'show'])->where('id', '[0-9]+')->name('comentario.show');
    Route::get('/edit', [ComentarioController::class, 'edit'])->where('id', '[0-9]+')->name('comentario.edit');
    Route::post('/update', [ComentarioController::class, 'update'])->where('id', '[0-9]+')->name('comentario.update');
    Route::get('/destroy', [ComentarioController::class, 'destroy'])->where('id', '[0-9]+')->name('comentario.destroy');
});

