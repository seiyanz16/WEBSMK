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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', \App\Http\Controllers\userController::class)->middleware('auth');

Route::delete('bidangstudi', [\App\Http\Controllers\BidangStudiController::class])->name('destroy');

Route::resource('bidangstudi', \App\Http\Controllers\BidangStudiController::class)->middleware('auth');

Route::resource('standkomp', \App\Http\Controllers\StandKompController::class)->middleware('auth');

Route::resource('kompkeahlian', \App\Http\Controllers\kompKeahlianController::class)->middleware('auth');

Route::resource('guru', \App\Http\Controllers\GuruController::class)->
middleware('auth');

Route::resource('mapel', \App\Http\Controllers\mapelController::class)->middleware('auth');

// Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
