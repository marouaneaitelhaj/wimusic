<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth as Auth;

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
Route::middleware('guest')->group(
    function () {
        Route::get('admin/login', [App\Http\Controllers\AdminController::class, 'login']);
        Route::post('admin/login', [App\Http\Controllers\AdminController::class, 'check']);
        Route::get('admin/logout', [App\Http\Controllers\AdminController::class, 'logout']);
    }
);
Route::middleware('webadmin')->group(
    function () {
        Route::get('artiste/{artiste}', [App\Http\Controllers\ArtisteController::class, 'artiste']);
        Route::get('profile/{id}', [App\Http\Controllers\UserController::class, 'index']);
        Route::get('artistes', [App\Http\Controllers\ArtisteController::class, 'artistes']);
        Route::post('ToArtistes', [App\Http\Controllers\ArtisteController::class, 'ToArtistes'])->name('ToArtistes');
        Route::get('single/{id}', [App\Http\Controllers\piecesController::class, 'single'])->name('single');
        Route::get('discover/{something?}', [App\Http\Controllers\piecesController::class, 'index']);
        Route::get('liked', [App\Http\Controllers\piecesController::class, 'liked'])->name('liked');
        Route::get('likedsongs', [App\Http\Controllers\piecesController::class, 'likedsongs'])->name('likedsongs');
        Route::get('addplaylist', [App\Http\Controllers\playlistsController::class, 'addplaylist'])->name('addplaylist');
        Route::post('addComment', [App\Http\Controllers\commenterController::class, 'store'])->name('addComment');
        Route::post('addplaylist', [App\Http\Controllers\playlistsController::class, 'store'])->name('addplaylist');
        Route::get('addtoplaylist', [App\Http\Controllers\playlistsController::class, 'addtoplaylist'])->name('addtoplaylist');
        Route::get('check', [App\Http\Controllers\piecesController::class, 'check'])->name('check');
        Route::get('playlistSong', [App\Http\Controllers\playlistsController::class, 'playlistSong'])->name('playlistSong');
        Route::get('bandes', [App\Http\Controllers\bandesController::class, 'index'])->name('bande');
        Route::get('bande/{id}', [App\Http\Controllers\bandesController::class, 'one'])->name('onebande');
        Route::get('deletefromplaylis', [App\Http\Controllers\playlistsController::class, 'deletefromplaylis'])->name('deletefromplaylis');
    }

);
Route::get('deleteComment', [App\Http\Controllers\commenterController::class, 'destroy'])->name('deleteComment');
Route::middleware('admin')->group(
    function () {
        Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('dashboard/artistes', [App\Http\Controllers\AdminController::class, 'artistes']);
        Route::post('dashboard/artistes', [App\Http\Controllers\ArtisteController::class, 'edit']);
        Route::get('dashboard/pieces', [App\Http\Controllers\AdminController::class, 'pieces']);
        Route::get('dashboard/Comment', [App\Http\Controllers\AdminController::class, 'Comment'])->name('Comment');
        Route::post('dashboard/pieces', [App\Http\Controllers\piecesController::class, 'update'])->name('update/pieces');
        Route::get('dashboard/Bandes', [App\Http\Controllers\bandesController::class, 'dashboardBandes'])->name('dashboardBandes');
        Route::post('dashboard/Bandes', [App\Http\Controllers\bandesController::class, 'editbande'])->name('editbande');
        Route::get('dashboard/Bandes/update', [App\Http\Controllers\bandesController::class, 'update'])->name('updateBandes');
        Route::post('dashboard/pieces/add', [App\Http\Controllers\piecesController::class, 'store'])->name('addpieces');
        Route::get('dashboard/addartistes', [App\Http\Controllers\AdminController::class, 'addartistes']);
        Route::get('dashboard/convertToArtistes', [App\Http\Controllers\AdminController::class, 'convertToArtistes'])->name('convertToArtistes');
        Route::get('dashboard/ban/{id}', [App\Http\Controllers\AdminController::class, 'ban']);
        Route::get('dashboard/banP/{id}', [App\Http\Controllers\piecesController::class, 'ban'])->name('banP');
        Route::get('Deletepieces', [App\Http\Controllers\piecesController::class, 'destroy'])->name('Deletepieces');
        Route::post('addbandes', [App\Http\Controllers\bandesController::class, 'store'])->name('addbandes');
        Route::get('deleteBandes', [App\Http\Controllers\bandesController::class, 'destroy'])->name('deleteBandes');
        Route::post('addmember', [App\Http\Controllers\bandesController::class, 'addmember'])->name('addmember');
    }
);