<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackController;
use App\Http\Livewire\DashboardIndex;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\DashboardDataAkunMahasiswa;
use App\Http\Livewire\DashboardDataInformasi;
use App\Http\Livewire\DashboardDataMahasiswa;
use App\Http\Livewire\DashboardProfile;
use Illuminate\Support\Facades\Route;

Route::get('/login', [BackController::class, 'login'])->name('login');
Route::get('/register', [BackController::class, 'register'])->name('register');
Route::post('/post-login', [BackController::class, 'postlogin'])->name('post-login');
Route::post('/post-register', [BackController::class, 'postregister'])->name('post-register');

// HOME ROUTE
Route::group(["prefix" => "/"], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/pendaftaran', [HomeController::class, 'pendaftaran'])->name('home-pendaftaran');
    Route::post('/pendaftaran/post', [HomeController::class, 'post_pendaftaran'])->name('post-pendaftaran');
    Route::get('/sendmail/{id}', [HomeController::class, 'send_email'])->name('home-send-email');
    Route::get('/informasi', [HomeController::class, 'home_informasi'])->name('home-informasi');
    Route::get('/informasi/{id}', [HomeController::class, 'lihat_informasi'])->name('home-lihat-informasi');
});

Route::group(["prefix" => "/dashboard", "middleware" => "ceklogin"], function () {
    Route::get('/verifikasi/{encryptedtoken}', [HomeController::class, 'verifikasi_email'])->name('verifikasi-email');
    // Route::get('/test-histori/{status}', [BackController::class, 'push_histori'])->name('test-histori');
    Route::get('/', DashboardIndex::class)->name('dashboard');
    Route::get('/profile', DashboardProfile::class)->name('profile');

    // INFORMASI
    Route::group(["prefix" => '/informasi'], function () {
        Route::get('/', DashboardDataInformasi::class)->name('data-informasi');
        Route::post('/informasi/save', [AdminController::class, 'save_informasi'])->name('save-informasi');
    });

    // MAHASISWA
    Route::group(["prefix" => '/mahasiswa'], function () {
        Route::get('/', DashboardDataMahasiswa::class)->name('data-mahasiswa');
    });

    // AKUN MAHASISWA
    Route::group(["prefix" => '/akun-mahasiswa'], function () {
        Route::get('/', DashboardDataAkunMahasiswa::class)->name('data-akun-mahasiswa');
    });
});

Route::group(["prefix" => "/generate"], function () {
    Route::get('/mahasiswa', [GenerateController::class, 'generate_mahasiswa'])->name('generate-mahasiswa');
    Route::get('/informasi', [GenerateController::class, 'generate_informasi'])->name('generate-informasi');
});
