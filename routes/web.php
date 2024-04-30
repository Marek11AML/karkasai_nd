<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\AuthController;
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

Route::redirect('/', '/conferences');
Route::get('/conferences', [ConferenceController::class, 'index'])-> 
    name('conferences.index');

Route::get('/conferences/create', [ConferenceController::class, 'create'])->
    name('conferences.create')->middleware('auth');

Route::post('/conferences/store', [ConferenceController::class, 'store'])->
    name('conferences.store')->middleware(['auth', 'can:create-conference']);
Route::get('/conferences/{id}/edit', [ConferenceController::class, 'edit'])->
    name('conferences.edit')->middleware('auth');
Route::put('/conferences/{id}/update', [ConferenceController::class, 'update'])->
    name('conferences.update')->middleware(['auth', 'can:create-conference']);

Route::get('/show-login', [AuthController::class, 'showLoginForm'])->
    name('show-login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::delete('/conferences/{id}/destroy', [ConferenceController::class, 'destroy'])->
    name('conferences.destroy');
