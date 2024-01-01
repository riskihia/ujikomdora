<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BkController;
use App\Http\Controllers\SekretarisController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WalasController;
use App\Http\Middleware\OnlyMemberMiddleware;
use App\Http\Middleware\WalasMiddleware;
use Carbon\Carbon;
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
//login admin
Route::get('/login', [AdminController::class, 'loginPage'])->name("login");
Route::post('/login', [AdminController::class, 'loginProses']);

//login walas
Route::get('/walas/login', [WalasController::class, 'login']);
Route::post('/walas/login', [WalasController::class, 'doLogin']);
//login sekretaris 
Route::get('/sekretaris/login', [SekretarisController::class, 'login']);
Route::post('/sekretaris/login', [SekretarisController::class, 'doLogin']);

Route::get('/register', [AdminController::class, 'registerPage'])->name("register");
Route::post('/register', [AdminController::class, 'registerProses']);

Route::middleware([OnlyMemberMiddleware::class])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name("dashboard")->middleware([OnlyMemberMiddleware::class]);
    Route::post('/logout', [AdminController::class, 'logoutProses'])->name('logout');

    
    //walas
    Route::post('/walas', [WalasController::class, 'createWalas']);
    Route::delete('/walas', [WalasController::class, 'deleteWalas']);
    Route::put('/walas', [WalasController::class, 'updateWalas']);
    Route::get('/walas/{id}/edit', [WalasController::class, 'editWalas']);
    
    //bk
    Route::post('/bk', [BkController::class, 'createBk']);
    Route::delete('/bk', [BkController::class, 'deleteBk']);
    Route::put('/bk', [BkController::class, 'updateBk']);
    Route::get('/bk/{id}/edit', [BkController::class, 'editBk']);
    
    //seretaris
    Route::post('/sekretaris', [SekretarisController::class, 'createSekretaris']);
    Route::delete('/sekretaris', [SekretarisController::class, 'deleteSekretaris']);
    Route::put('/sekretaris', [SekretarisController::class, 'updateSekretaris']);
    Route::get('/sekretaris/{id}/edit', [SekretarisController::class, 'editSekretaris']);
    
    Route::post('/siswa', [SiswaController::class, 'add']);
    Route::delete('/siswa', [SiswaController::class, 'destroy']);
    Route::put('/siswa', [SiswaController::class, 'update']);
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);
    
    Route::get('/walas', [WalasController::class, 'walasPage']);
    Route::get('/bk', [BkController::class, 'bkPage']);
    Route::get('/sekretaris', [SekretarisController::class, 'sekretarisPage']);
    Route::get('/siswa',[SiswaController::class,'index']);
});

Route::middleware([WalasMiddleware::class])->group(function () {
    Route::get("/absensi/data/{filter}", [AbsensiController::class, 'show']);
    
    //sekretaris
    Route::get("/absensi/sekretaris", [AbsensiController::class, 'indexSekretaris']);
    Route::post("/absensi/sekretaris", [AbsensiController::class, 'update']);
    Route::post('/sekretaris/logout', [SekretarisController::class, 'logout']);
        
    //walas
    Route::get("/absensi/walas", [AbsensiController::class, 'indexWalas']);
    Route::post("/absensi/walas", [AbsensiController::class, 'update']);
    Route::post('/walas/logout', [WalasController::class, 'logout']);
});