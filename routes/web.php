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

Route::prefix('5mm')->group(function () {
    Route::prefix('/mu5tj')->group(function () {
        Route::prefix('/longsong')->group(function () {
            Route::get('/hb-1', [MU5TJController::class, 'getAll'])->middleware('mustBeLoggedIn');
        });
    });

});
//
//Route::get('/5mm/mu5tj/longsong/hb-1', [MU5TJController::class, 'getAll'])->middleware('mustBeLoggedIn');
Route::get('/mu5tj/create', [MU5TJController::class, 'create'])->middleware('mustBeLoggedIn');
Route::get('/mu5tj/{mu5tj}/dimensi', [MU5TJController::class, 'viewSinglePost'])->where('mu5tj', '[0-9]+')->middleware('mustBeLoggedIn');
