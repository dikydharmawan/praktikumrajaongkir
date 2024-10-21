<?php
use App\Http\Controllers\OngkirController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/provinsi', [OngkirController::class,'listProvinsi']);
Route::get('/provinsi/{id}', [OngkirController::class,'getProvinsi']);
Route::get('/kota', [OngkirController::class,'listCity']);
Route::get('/kota/{id}', [OngkirController::class,'getCity']);
Route::get('/getcost/{origin}/{destination}/{weight}/{courier}', [OngkirController::class, 'getcost']);
