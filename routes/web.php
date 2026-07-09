<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/profil', [FrontendController::class, 'profil'])->name('profil');
Route::get('/berita', [FrontendController::class, 'berita'])->name('berita.index');
Route::get('/berita/{slug}', [FrontendController::class, 'beritaDetail'])->name('berita.show');
Route::get('/program', [FrontendController::class, 'program'])->name('program.index');
Route::get('/proyek', [FrontendController::class, 'proyek'])->name('proyek.index');
Route::get('/galeri', [FrontendController::class, 'galeri'])->name('galeri');
Route::get('/dokumen', [FrontendController::class, 'dokumen'])->name('dokumen.index');
Route::get('/layanan', [FrontendController::class, 'layanan'])->name('layanan');
Route::get('/aduan', [FrontendController::class, 'aduan'])->name('aduan');
Route::post('/aduan', [FrontendController::class, 'storeAduan'])->name('aduan.store');
