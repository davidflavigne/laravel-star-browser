<?php

use App\Http\Controllers\StarController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [StarController::class, 'index'])->name('star.index');
Route::get('/star/create', [StarController::class, 'create'])->name('star.create');
Route::get('/star/{id}/edit', [StarController::class, 'edit'])->name('star.edit');
Route::delete('/star/{id}', [StarController::class, 'destroy'])->name('star.destroy');

require __DIR__.'/auth.php';
