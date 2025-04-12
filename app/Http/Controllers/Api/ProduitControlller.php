<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = produit::All();
        return response()->json($produits);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'integer',
            'nom' => 'required|string|max:70',
            'quantitee' => 'integer',
            'prix_unitaire' => 'integer',
            'description' => 'required|string|min:6',
            'entree_sortir' => 'required|string|max:30',
            'etat' => 'string|max:255'
       ]);
        produit::create($request->All());
       return response()->json($request->All(),201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produits = produit::find($id);
        return response()->json($produits);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:70',
            'quantitee' => 'integer',
            'prix_unitaire' => 'integer',
            'description' => 'required|string|min:6',
            'entree_sortir' => 'required|string|max:30',
            'etat' => 'string|max:255'
        ]);
        $produit = produit::findOrFail($id);
        $produit->update($request->All());
        return response()->json($request->All()); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produit = produit::findOrFail($id);
        $produit->delete();
        return response()->json(['message'=>'Produit supprimee avec success !']);
    }

    public function entree()
    {
        $entree =  DB::table('produits')->where('entree_sortir', 'entree')->get();
        return response()->json($entree);
    }

    public function sortie()
    {
        $sortie =  DB::table('produits')->where('entree_sortir', 'sortie')->get();
        return response()->json($sortie);
    }

    public function etat(Request $request)
    {
        $nom = $request->input('nom');
         $sommes1 = produit::where('nom', $nom)->where('entree_sortir', 'entree')->sum('quantitee');
         $sommes2 = produit::where('nom', $nom)->where('entree_sortir', 'sortie')->sum('quantitee');
         $resultat = $sommes1 - $sommes2;
         return response()->json(['Nombre de '.$nom.' restant' => $resultat]);
    }

}
