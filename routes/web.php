<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\jadwalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[homeController::class, 'home']);
Route::get('/jadwal',[jadwalController::class, 'jadwal']);
