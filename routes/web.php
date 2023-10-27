<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TransactionController;

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

Route::fallback(function () {
    return "Wah kamu nyasar, turn back!";
});

Route::get('/', function () {
    return view('landing');
});


Route::get('/about', [AboutController::class, 'index']);
Route::get('/transaction', [TransactionController::class,'index']);

Route::resource('transactions', TransactionController::class);
