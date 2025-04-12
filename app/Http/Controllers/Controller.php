<?php

namespace App\Http\Controllers;

use App\Models\produit;

abstract class Controller
{
    public function index()
    {
        $produits = produit::All();
        dd($produits);
        return response()->json($produits);
    }
}
