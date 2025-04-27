<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\Client\AcceuilController;
use App\Http\Controllers\CommandeController;

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('dashboard', function () {
    return
    redirect()->route('acceuil.index');
})->Middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');
Route::post('/panier', [PanierController::class, 'store'])->name('panier.store');
Route::get('/panier/{id}', [PanierController::class, 'edit'])->name('panier.edit');
Route::delete('/panier/{id}', [PanierController::class, 'destroy'])->name('panier.destroy');
Route::get('/produit', [ProduitController::class, 'index'])->name('produit.index');
Route::get('/produit/{id}', [ProduitController::class, 'show'])->name('produit.show');
Route::get('/produit/{id}/edit', [ProduitController::class, 'edit'])->name('produit.edit');
Route::put('/produit/{id}', [ProduitController::class, 'update'])->name('produit.update');
Route::delete('/produit/{id}', [ProduitController::class, 'destroy'])->name('produit.destroy');
Route::get('/acceuil', [AcceuilController::class, 'index'])->name('acceuil.index');
Route::get('/commande', [CommandeController::class, 'index'])->name('commande.index');

//Mildwares necessaires
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Route de breeze
require __DIR__.'/auth.php';