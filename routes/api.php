<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware([])->get('/users', function () {
    return datatables()
     ->eloquent(User::query())
     ->addColumn('btn','master.users.actions')
     ->rawColumns(['btn'])
     ->toJson();
})->name('users');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
