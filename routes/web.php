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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/all-user', [App\Http\Controllers\backend\UserController::class, 'AllUser'])->name('alluser');

Route::get('/add-user', [App\Http\Controllers\backend\UserController::class, 'AddUser'])->name('adduser');

Route::get('/delete-user/{id}', [App\Http\Controllers\backend\UserController::class, 'destroy'])->name('deleteuser');

Route::post('/store', [App\Http\Controllers\backend\UserController::class, 'store'])->name('storeuser');

Route::get('/edit-user/{id}', [App\Http\Controllers\backend\UserController::class, 'edit'])->name('edituser');

Route::patch('/update/{id}', [App\Http\Controllers\backend\UserController::class, 'update'])->name('updateuser');

Route::get('/datatables', function () {
    return view('backend.datatables');
});
