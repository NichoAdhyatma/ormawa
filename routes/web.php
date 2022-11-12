<?php

use Inertia\Inertia;
use App\Http\Controllers\AuthAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrganisasiController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('home');
Route::resource('/organisasi', OrganisasiController::class);
Route::resource('/category', CategoryController::class)->only(['show']);

Route::middleware([
    'admin'
])->group(function() {
    Route::resource('/admin', AdminController::class);
    Route::post('/logout-admin', [AuthAdmin::class, 'logout'])->name('admin.logout');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/dashboard/ormawa', OrmawaController::class);

    Route::resource('/dashboard/file', FileController::class);
});

// Route::get('/template', function () {
//     return Inertia::render('Dashboard/Template');
// })->middleware(['auth:web', config('jetstream.auth_session')]);

Route::middleware('guest:admin')->group(function () {
    Route::get('/admin-login', [AuthAdmin::class, 'index'])->name('admin.login');
    Route::post('/admin-login', [AuthAdmin::class, 'authenticate'])->name('admin.auth');
});
