<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin/dashboard_admin');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('auth', 'admin');

Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::controller(UserController::class)->name('user.')->group(function () {
            Route::get('/user/view', 'getUser')->name('getUser');
            Route::get('/user/tambah', 'tambah')->name('tambah');
            Route::get('/user/edit/{user}', 'edit')->name('edit');
            Route::post('/user/simpan', 'saveUser')->name('saveUser');
            Route::patch('/user/update/{user}', 'updateUser')->name('updateUser');
            Route::delete('/user/hapus/{user}', 'deleteUser')->name('deleteUser');
        });
