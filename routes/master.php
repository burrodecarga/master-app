<?php

use App\Http\Livewire\Master\ListOfRoles;
use Illuminate\Support\Facades\Route;


Route::get('/roles', ListOfRoles::class)->name('roles');










