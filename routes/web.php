<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::controller(UserController::class)->name('user.')->group(function () {
            Route::get('/user/view', 'getUser')->name('getUser');
            Route::get('/user/tambah', 'tambah')->name('tambah');
            Route::get('/user/edit/{user}', 'edit')->name('edit');
            Route::post('/user/simpan', 'saveUser')->name('saveUser');
            Route::patch('/user/update/{user}', 'updateUser')->name('updateUser');
            Route::delete('/user/hapus/{user}', 'deleteUser')->name('deleteUser');
        });
