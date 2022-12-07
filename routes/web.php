<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;


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


Route::get('/', [FrontController::class, 'index'])->name('guest.index');
Route::get('/{username}', [FrontController::class, 'public'])->name('public')->middleware('guest');


Route::get('users/test', [TestController::class, 'test']);
# File: routes/web.php

// Show Register Page & Login Page
Route::get('/user/login', [LoginController::class, 'show'])
    ->name('login')
    ->middleware('guest');

Route::get('/user/register', [RegistrationController::class, 'show'])
    ->name('register')
    ->middleware('guest');

Route::post('/track/link', [TrackController::class, 'track'])->name('track')->middleware('guest');


// Register & Login User
Route::post('/user/login', [LoginController::class, 'authenticate'])->name('auth');
Route::post('/user/register', [RegistrationController::class, 'register'])->name('register');
Route::post('/register-final', [RegistrationController::class, 'registerFinal'])->name('register.final');


Route::get('/auth/google', [LoginController::class, 'redirectToProvider'])->name('google.auth')->middleware('guest');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->middleware('guest');


Route::post('fileupload', [TestController::class, 'fileStore'])->name('test.bar');
// Protected Routes - allows only logged in users
Route::middleware('auth')->group(function () {
    Route::get('/user/{username}', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/{username}/edit', [DashboardController::class, 'edit'])->name('edit');
    Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('update-profile');
    Route::post('/update-avatar', [ProfileController::class, 'updateAvatar'])->name('update-avatar');
    Route::post('/search-link-from-database', [LinkController::class, 'searchFromDatabase'])->name('searchFromDatabase');
    Route::post('/create-link', [LinkController::class, 'createLink'])->name('create-link');
    Route::post('/update-link', [LinkController::class, 'updateLink'])->name('update-link');
    Route::post('/delete-link', [LinkController::class, 'deleteLink'])->name('delete-link');
    Route::post('/update-theme', [DashboardController::class, 'updateTheme'])->name('update-theme');
    Route::post('/update-user-details', [ProfileController::class, 'updateUserDetails'])->name('update-user-details');
    Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update-password');
    Route::get('/{username}/customize', [DashboardController::class, 'customize'])->name('customize');
    Route::get('/{username}/register-final', [RegistrationController::class, 'registerFinalShow'])->name('register.final.show');
    Route::get('/{username}/settings', [ProfileController::class, 'settingsShow'])->name('settings.show');
    Route::get('/track/show', [TrackController::class, 'trackShow'])->name('track.show');
    Route::get('/{username}/logout', [LoginController::class, 'logout'])->name('logout');
});
