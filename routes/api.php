<?php

use App\Http\Controllers\AFKontroler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirmaKontroler;
use App\Http\Controllers\ProizvodKontroler;

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

Route::post('registracija', [AFKontroler::class, 'register']);
Route::post('login', [AFKontroler::class, 'login']);
Route::resource('firma', FirmaKontroler::class)->only('index');
Route::resource('proizvod', ProizvodKontroler::class)->only('index', 'show');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [AFKontroler::class, 'logout']);
    Route::resource('firma', FirmaKontroler::class)->only('destroy');
    Route::resource('proizvod', ProizvodKontroler::class)->only('destroy', 'update');
});
