<?php

use App\Http\Controllers\Api\ProduitControlller;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/produits', ProduitControlller::class);
Route::get('/entree', [ProduitControlller::class, 'entree'])->name('entree');
Route::get('/sortie', [ProduitControlller::class, 'sortie'])->name('sortie');
Route::get('/etat', [ProduitControlller::class, 'etat'])->name('etat');

Route::apiResource('/users', UserController::class);
Route::post('/login', [UserController::class, 'login']);
