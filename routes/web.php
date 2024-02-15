<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


// display all users
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// create user
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// store users
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// show specific user ID
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

// esit user ID
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// update user ID
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// delete user ID
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::fallback(function () {
    return redirect('/');
});
