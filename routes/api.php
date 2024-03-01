<?php

use App\Http\Controllers\StarController;
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


Route::post('/star/save', [StarController::class, 'store'])->name('star.store');
Route::put('/star/{id}/update', [StarController::class, 'update'])->name('star.update');
Route::delete('/star/{id}', [StarController::class, 'destroy'])->name('star.destroy');