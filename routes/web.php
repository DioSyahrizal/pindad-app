<?php

use App\Http\Controllers\MU5TJController;
use App\Http\Controllers\MU5TJDimensiController;
use App\Http\Controllers\MU5TJHB2Controller;
use App\Http\Controllers\Mu5tjLongsongPengirimanController;
use App\Http\Controllers\Mu5tjLongsongVisuilController;
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
            Route::get('/hb-1/table', [MU5TJController::class, 'getTableAll'])->middleware('mustBeLoggedIn');
            Route::get('/hb-1/create', [MU5TJController::class, 'create'])->middleware('mustBeLoggedIn');
            Route::get('/hb-1/{mu5tj}/detail', [MU5TJController::class, 'viewSinglePost'])->where('mu5tj', '[0-9]+')->middleware('mustBeLoggedIn');

            Route::get('/dimensi', [MU5TJDimensiController::class, 'getAll'])->middleware('mustBeLoggedIn');
            Route::get('/dimensi/create', [MU5TJDimensiController::class, 'create'])->middleware('mustBeLoggedIn');
            Route::get('/dimensi/{dimensi}/detail', [MU5TJDimensiController::class, 'viewSinglePost'])->where('dimensi', '[0-9]+')->middleware('mustBeLoggedIn');

            Route::get('/hb-2', [MU5TJHB2Controller::class, 'getAll'])->middleware('mustBeLoggedIn');
            Route::get('/hb-2/create', [MU5TJHB2Controller::class, 'create'])->middleware('mustBeLoggedIn');

            Route::get('/visuil', [Mu5tjLongsongVisuilController::class, 'getAll'])->middleware('mustBeLoggedIn');
            Route::get('/visuil/create', [Mu5tjLongsongVisuilController::class, 'create'])->middleware('mustBeLoggedIn');

            Route::get('/pengiriman', [Mu5tjLongsongPengirimanController::class, 'getAll'])->middleware('mustBeLoggedIn');
            Route::get('/pengiriman/create', [Mu5tjLongsongPengirimanController::class, 'create'])->middleware('mustBeLoggedIn');
            Route::get('/pengiriman/{mu5tj}/detail', [Mu5tjLongsongPengirimanController::class, 'viewSinglePost'])->where('mu5tj', '[0-9]+')->middleware('mustBeLoggedIn');
        });
    });

});
//
//Route::get('/5mm/mu5tj/longsong/hb-1', [MU5TJController::class, 'getAll'])->middleware('mustBeLoggedIn');
Route::get('/mu5tj/create', [MU5TJController::class, 'create'])->middleware('mustBeLoggedIn');

