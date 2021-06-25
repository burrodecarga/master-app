<?php

use App\Http\Controllers\Admin\Homecontroller;
use App\Http\Livewire\Admin\SocialMedia;
use Illuminate\Support\Facades\Route;



Route::get('', [Homecontroller::class,'index'])->name('admin');
Route::get('/administrar/{condominio}', [HomeController::class,'administrar'])->name('administrar');

Route::get('/social-media/{condominio}',SocialMedia::class)->name('admin-social');

Route::get('/gestion', [HomeController::class,'gestion'])->name('gestion');





