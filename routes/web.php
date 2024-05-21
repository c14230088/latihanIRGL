<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\mahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[homeController::class, 'home']);
Route::get('/jadwal',[jadwalController::class, 'jadwal']);

Route::get('/mahasiswa',[mahasiswaController::class, 'mahasiswa']);
Route::post('/mahasiswa', [mahasiswaController::class, 'crudAdd']);
Route::put('/mahasiswa', [mahasiswaController::class, 'crudEdit']); 
Route::delete('/mahasiswa', [mahasiswaController::class, 'crudDelete']);
