<?php

use App\Http\Controllers\MU5TJController;
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

Route::get('/', [UserController::class, 'homePage'])->middleware('mustBeLoggedIn');
Route::get("/login", [UserController::class, "login"])->name("login")->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('mustBeLoggedIn');

Route::get('/mu5tj', [MU5TJController::class, 'getAll'])->middleware('mustBeLoggedIn');
Route::get('/mu5tj/create', [MU5TJController::class, 'create'])->middleware('mustBeLoggedIn');
