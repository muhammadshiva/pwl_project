<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterAdminController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
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
    return view('home');
});

// Route::get('/siswa', function () {
//     return view('siswa');
// });

// Route::get('/guru', function () {
//     return view('guru');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'admin'], function () {

    Route::prefix('admin')->group(function () {
        Route::resource('masterAdmin', MasterAdminController::class);
        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::resource('user', UserController::class);
        Route::resource('mapel', MapelController::class);
    });
});
Route::group(['middleware' => 'guru'], function () {
    Route::get('/tambahTugas/{id}', [GuruController::class, 'tambahTugas'])->name('tambahTugas');
    // Route::get('/guru', [GuruController::class, 'index']);
    Route::resource('guru', GuruController::class);
});
Route::group(['middleware' => 'siswa'], function () {
    Route::get('/siswa', [SiswaController::class, 'index']);
});
