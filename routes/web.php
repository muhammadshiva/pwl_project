<?php

use App\Http\Middleware\IsUser;
use GuzzleHttp\Middleware;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/dashboard', 'dashboard');
// Route::view('/', 'pages.auth.login');

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardAdminController::class, 'index']);
    Route::get('/member', [App\Http\Controllers\MemberController::class, 'index']);
});

Auth::routes();

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('is_user');
