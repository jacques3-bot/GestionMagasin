<?php

use App\Http\Controllers\Api\ProduitControlller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

