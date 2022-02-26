<?php

use App\Http\Controllers\BackController;
use App\Http\Livewire\DashboardIndex;
use App\Http\Controllers\GenerateController;
use App\Http\Livewire\DashboardDataMahasiswa;
use App\Http\Livewire\DashboardProfile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix" => "/dashboard"], function () {
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
