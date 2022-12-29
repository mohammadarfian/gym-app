<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);

Route::get('/member', [MemberController::class, 'dashboard'])->middleware(['auth', 'check-access:0']);
Route::get('/member/detail/lihat',[MemberController::class, 'Detail'])->middleware(['auth', 'check-access:0']);
Route::get('/member/detail/transaksi',[MemberController::class, 'Transaksi'])->middleware(['auth', 'check-access:0']);

Route::group(['prefix' => 'user/'], function () {
    Route::get("register", [UserController::class, "register"]);
    Route::post("process-register", [UserController::class, "processRegister"]);
    Route::get("login", [UserController::class, "login"])->name("login");
    Route::post("process-login", [UserController::class, "processLogin"]);
    Route::get("process-logout", [UserController::class, "processLogout"]);
});

Route::prefix('memberlist')->group(function(){
    route::get('/',[MemberController::class, 'index'])->name('member.index');
    route::get('/delete/{id}',[MemberController::class, 'destroy'])->name('member.destroy');
});

Route::prefix('coach')->group(function(){
    route::get('/',[CoachController::class, 'CoachView'])->name('coach.view');
    route::get('/add',[CoachController::class, 'CoachAdd'])->name('coach.add');
    route::post('/store',[CoachController::class, 'CoachStore'])->name('coachs.store');
    route::get('/edit/{id}',[CoachController::class, 'CoachEdit'])->name('coachs.edit');
    route::post('/update/{id}',[CoachController::class, 'CoachUpdate'])->name('coachs.update');
    route::get('/delete/{id}',[CoachController::class, 'CoachDelete'])->name('coachs.delete');
});

Route::prefix('paket')->group(function(){
    route::get('/',[PaketController::class, 'PaketView'])->name('paket.view');
    route::get('/add',[PaketController::class, 'PaketAdd'])->name('paket.add');
    route::post('/store',[PaketController::class, 'PaketStore'])->name('pakets.store');
    route::get('/edit/{id}',[PaketController::class, 'PaketEdit'])->name('pakets.edit');
    route::post('/update/{id}',[PaketController::class, 'PaketUpdate'])->name('pakets.update');
    route::get('/delete/{id}',[PaketController::class, 'PaketDelete'])->name('pakets.delete');
});

Route::prefix('jadwal')->group(function(){
    Route::get('/create', [JadwalController::class, 'JadwalCreate']);
    Route::post('/store', [JadwalController::class, 'JadwalStore']);
    route::get('/view',[JadwalController::class, 'JadwalView']);
    route::get('/riwayat',[JadwalController::class, 'JadwalRiwayat']);
});

Route::prefix('transaksi')->group(function(){
    route::get('/',[TransaksiController::class, 'TransaksiView']);
    route::get('/edit/{id}',[TransaksiController::class, 'TransaksiEdit']);
    route::post('/update/{id}',[TransaksiController::class, 'TransaksiUpdate']);
    route::get('/delete/{id}',[TransaksiController::class, 'TransaksiDelete']);
    route::get('/invoice/{id}',[TransaksiController::class, 'Invoice']);
});
