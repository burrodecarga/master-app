<?php

use App\Http\Controllers\Master\ApartamentController;
use App\Http\Controllers\Master\BankController;
use App\Http\Controllers\Master\CondominioController;
use App\Http\Controllers\Master\PermissionController;
use App\Http\Controllers\Master\RoleController;
use App\Http\Controllers\Master\UserController;
use App\Http\Livewire\Master\Roles\ListOfRoles;
use App\Http\Livewire\Master\Users\ListOfUsers;
use Illuminate\Support\Facades\Route;


Route::resource('/roles',RoleController::class)->names('roles')->middleware(['auth:sanctum', 'verified','role:super-admin']);

Route::resource('/permissions',PermissionController::class)->names('permissions')->middleware(['auth:sanctum', 'verified','role:super-admin']);

Route::resource('/users',UserController::class)->names('users')->middleware(['auth:sanctum', 'verified','role:super-admin']);

Route::resource('/condominios',CondominioController::class)->names('condominios')->middleware(['auth:sanctum', 'verified','role:super-admin']);

Route::resource('/apartments',ApartamentController::class)->names('apartments')->middleware(['auth:sanctum', 'verified','role:super-admin']);

Route::resource('/banks',BankController::class)->names('banks')->middleware(['auth:sanctum', 'verified','role:super-admin']);




Route::get('/roles-livewire', ListOfRoles::class)->name('roles-livewire');
Route::get('/users-livewire', ListOfUsers::class)->name('users-livewire');











