<?php

use App\Http\Controllers\BackController;
use App\Http\Livewire\DashboardIndex;
use App\Http\Controllers\GenerateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix" => "/dashboard"], function () {
    // Route::get('/', [BackController::class, 'index'])->name('dashboard');
    Route::get('/', DashboardIndex::class)->name('dashboard');
});


Route::group(["prefix" => "/generate"], function () {
    Route::get('/mahasiswa', [GenerateController::class, 'generate_mahasiswa'])->name('generate-mahasiswa');
});
