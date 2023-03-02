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
Route::get('admin/signup', [App\Http\Controllers\AdminController::class, 'create'])->middleware('guest');
Route::post('admin/signup', [App\Http\Controllers\AdminController::class, 'store'])->middleware('guest');
Route::get('admin/login', [App\Http\Controllers\AdminController::class, 'login'])->middleware('guest');
Route::post('admin/login', [App\Http\Controllers\AdminController::class, 'check'])->middleware('guest');
Route::get('admin/logout', [App\Http\Controllers\AdminController::class, 'logout'])->middleware('guest');
Route::middleware('auth')->group(function () {
    Route::get('artiste/{artiste}', [App\Http\Controllers\ArtisteController::class, 'artiste']);
    Route::get('profile/{id}', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('artistes', [App\Http\Controllers\ArtisteController::class, 'artistes']);
    Route::get('discover/{something?}', [App\Http\Controllers\piecesController::class, 'index']);
    Route::get('liked', [App\Http\Controllers\piecesController::class, 'liked'])->name('liked');
    Route::get('addplaylist', [App\Http\Controllers\playlistsController::class, 'addplaylist'])->name('addplaylist');
    Route::post('addplaylist', [App\Http\Controllers\playlistsController::class, 'store'])->name('addplaylist');
    Route::get('addtoplaylist', [App\Http\Controllers\playlistsController::class, 'addtoplaylist'])->name('addtoplaylist');
    Route::get('check', [App\Http\Controllers\piecesController::class, 'check'])->name('check');
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->middleware('admin');
    Route::get('dashboard/artistes', [App\Http\Controllers\AdminController::class, 'artistes']);
    Route::get('dashboard/pieces', [App\Http\Controllers\AdminController::class, 'pieces']);
    Route::get('dashboard/addartistes', [App\Http\Controllers\AdminController::class, 'addartistes']);
    Route::get('dashboard/ban/{id}', [App\Http\Controllers\AdminController::class, 'ban']);
    Route::get('playlistSong', [App\Http\Controllers\playlistsController::class, 'playlistSong'])->name('playlistSong');
});
