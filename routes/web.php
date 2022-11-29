<?php

use App\Models\User;
use Inertia\Inertia;
use App\Models\Organisasi;
use App\Http\Controllers\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\StrukturController;

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
//Landing Page
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('home');
Route::resource('/category', CategoryController::class)->only(['show']);

Route::middleware([
    'admin'
])->group(function () {
    Route::resource('/admin', AdminController::class);
    Route::post('/logout-admin', [AuthAdmin::class, 'logout'])->name('admin.logout');
    Route::get('/admin-mahasiswa', [AdminController::class, 'mahasiswa'])->name('admin.mahasiswa');
    Route::resource('/dashboard/struktur', StrukturController::class);
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
    Route::post('/file/delete', [FileController::class, 'deleteFile']);

    Route::get('/dashboard/notif', [NotifController::class, 'index'])->name('notif');
    Route::post('/dashboard/notif/{notif}', [NotifController::class, 'markAsRead'])->name('notif.read');
    Route::delete('/dashboard/notif/{notif}', [NotifController::class, 'destroy'])->name('notif.destroy');
    Route::resource('/dashboard/organisasi', OrganisasiController::class);
});

Route::middleware('guest:admin')->group(function () {
    Route::get('/admin-login', [AuthAdmin::class, 'index'])->name('admin.login');
    Route::post('/admin-login', [AuthAdmin::class, 'authenticate'])->name('admin.auth');
});
