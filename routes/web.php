<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TithesController;
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

Route::middleware(['guest', 'nocache'])->group(function () {
    Route::redirect('/', '/login');
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::get('/forgot-password', [AuthenticatedSessionController::class, 'reset_password'])->name('password.update');
});

Route::middleware(['auth', 'verified'])->group(function () {
    //Language Translation
    Route::get('/index/{locale}', [HomeController::class, 'lang']);
    Route::get('/', [HomeController::class, 'root'])->name('root');

    Route::resource('/dashboards', DashboardController::class)->middleware(['auth', 'verified', 'nocache']);

    Route::prefix('dashboard')->middleware(['auth', 'verified', 'checkSession'])->group(function () {
        Route::resource('/announcements', AnnouncementController::class);
        Route::resource('/users', UserController::class)->except(['index']);
        Route::get('/directory/{section}', [UserController::class, 'index'])->name('users.index');
        Route::get('/profile/{user}', [UserController::class, 'profile'])->name('users.profile');
        Route::resource('/events', EventController::class);
        Route::resource('/tithes', TithesController::class);
        Route::resource('/announcements', AnnouncementController::class);

        //Update User Details
        Route::post('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');
        Route::post('/update-password/{id}', [HomeController::class, 'updatePassword'])->name('updatePassword');
    });
});

Route::fallback( function() {
    return redirect()->route('root');
});

require __DIR__ . '/auth.php';
