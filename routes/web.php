<?php

use App\Http\Controllers\BackController;
use App\Http\Livewire\DashboardIndex;
use App\Http\Controllers\GenerateController;
use App\Http\Livewire\DashboardDataMahasiswa;
use App\Http\Livewire\DashboardProfile;
use Illuminate\Support\Facades\Route;

Route::get('/login', [BackController::class, 'login'])->name('login');
Route::get('/register', [BackController::class, 'register'])->name('register');
Route::post('/post-login', [BackController::class, 'postlogin'])->name('post-login');
Route::post('/post-register', [BackController::class, 'postregister'])->name('post-register');

Route::group(["prefix" => "/dashboard", "middleware" => "ceklogin"], function () {
    // Route::get('/', [BackController::class, 'index'])->name('dashboard');
    Route::get('/', DashboardIndex::class)->name('dashboard');
    Route::get('/profile', DashboardProfile::class)->name('profile');

    // MAHASISWA
    Route::group(["prefix" => '/mahasiswa'], function () {
        Route::get('/', DashboardDataMahasiswa::class)->name('data-mahasiswa');
    });
});


Route::group(["prefix" => "/generate"], function () {
    Route::get('/mahasiswa', [GenerateController::class, 'generate_mahasiswa'])->name('generate-mahasiswa');
});
