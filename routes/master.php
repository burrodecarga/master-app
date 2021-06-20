<?php

use App\Http\Livewire\Master\Roles\ListOfRoles;
use App\Http\Livewire\Master\Users\ListOfUsers;
use Illuminate\Support\Facades\Route;


Route::get('/roles', ListOfRoles::class)->name('roles');
Route::get('/users', ListOfUsers::class)->name('users');











