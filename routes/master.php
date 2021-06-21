<?php

use App\Http\Controllers\Master\PermissionController;
use App\Http\Controllers\Master\RoleController;
use App\Http\Livewire\Master\Roles\ListOfRoles;
use App\Http\Livewire\Master\Users\ListOfUsers;
use Illuminate\Support\Facades\Route;


Route::resource('/roles',RoleController::class)->names('roles')->middleware(['auth:sanctum', 'verified','role:super-admin']);

Route::resource('/permissions',PermissionController::class)->names('permissions')->middleware(['auth:sanctum', 'verified','role:super-admin']);



Route::get('/roles-livewire', ListOfRoles::class)->name('roles-livewire');
Route::get('/users-livewire', ListOfUsers::class)->name('users-livewire');











