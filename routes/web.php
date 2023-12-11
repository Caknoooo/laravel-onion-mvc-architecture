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

Route::post('/register', [UserController::class, 'create'])->name('register');
Route::get('/register', function () {
    return view('auth.register');
})->name('user.create');

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/login', function () {
    return view('auth.login');
})->name('user.login');
