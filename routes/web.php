<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\WalasController;
use App\Http\Middleware\OnlyMemberMiddleware;
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

Route::get('/', [AdminController::class, 'dashboard'])->name("dashboard")->middleware([OnlyMemberMiddleware::class]);

Route::get('/login', [AdminController::class, 'loginPage'])->name("login");
Route::post('/login', [AdminController::class, 'loginProses']);

Route::get('/register', [AdminController::class, 'registerPage'])->name("register");
Route::post('/register', [AdminController::class, 'registerProses']);


//walas
Route::post('/walas', [WalasController::class, 'createWalas']);
Route::delete('/walas', [WalasController::class, 'deleteWalas']);
Route::put('/walas', [WalasController::class, 'updateWalas']);
Route::get('/walas/{id}/edit', [WalasController::class, 'editWalas']);

Route::get('/walas', [WalasController::class, 'walasPage']);
Route::get('/bk', [AdminController::class, 'bkPage']);
Route::get('/sekretaris', [AdminController::class, 'sekretarisPage']);
