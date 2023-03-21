<?php

use App\Http\Controllers\CalculateNilai;
use App\Http\Controllers\CalculateNilaiAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::get('/test', 'CalculateNilaiAPI@inputScore');

Route::controller(CalculateNilaiAPI::class)->group(function () {
    Route::post('/scoreInput', 'scoreInput');
    Route::get('/scoreGet/{id}', 'scoreGet');
    Route::get('/scoreGetall', 'scoreGetall');
    Route::post('/scoreUpdate/{id}', 'scoreUpdate');
    Route::delete('/scoreDelete/{id}', 'scoreDelete');
});
