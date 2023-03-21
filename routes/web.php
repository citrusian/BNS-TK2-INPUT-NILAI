<?php

use App\Http\Controllers\CalculateNilai;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
//    return redirect('/inputnilai');
});

Route::get('/inputnilai', function () {
    return view('SimpleView');
});

Route::post('/inputnilai', CalculateNilai::class)->name('Grade');
