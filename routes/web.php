<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarteiraController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\TransferenciaController;
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
Route::resource('carteira', CarteiraController::class);

Route::resource('despesa', DespesaController::class);

Route::resource('receita', ReceitaController::class);

Route::resource('transferencia', TransferenciaController::class);

Route::get('/', function () {
    return view('auth.login');
});

Route::put('/carteira/{$id}',[CarteiraController::class, 'transfer'])->name('carteira.transfer');

Route::patch('/carteira/{$id}',[CarteiraController::class, 'calculate'])->name('carteira.calc');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
