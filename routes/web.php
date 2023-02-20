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
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('', [App\Http\Controllers\ArtisteController::class, 'index']);
Route::get('artistes', [App\Http\Controllers\ArtisteController::class, 'artistes']);
Route::get('artiste/{artiste}', [App\Http\Controllers\ArtisteController::class, 'artiste']);
Route::get('discover', [App\Http\Controllers\piecesController::class, 'index']);
