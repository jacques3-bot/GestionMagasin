<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Laravel\Sanctum\HasApiTokens;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::All();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
             'nom' => 'required|string|max:70',
             'email' => 'required|string|email|unique:Users|max:80',
             'mot_de_pass' => 'required|string|min:6'
        ]);
        $request['mot_de_pass'] = bcrypt($request['mot_de_pass']);
        User::create($request->All());
        return response()->json($request->All(),201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::findOrFail($id);
        return response()->json($users);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:70',
            'email' => 'required|string|max:80|email|unique:Users,email'.$id,
            'mot_de_pass' => 'required|string|min:6'
        ]);
        $request['mot_de_pass'] = bcrypt($request['mot_de_pass']);
        $user = User::findOrFail($id);
        $users = $user->update($request->All());
        return response()->json($users); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message'=>'Utilisateur supprimee avec success !']);
    }


    public function login (Request $request) 
    {
        $request->validate([
           'email' => 'required|string|max:80|email',
            'mot_de_pass' => 'required|string|min:6'
        ]);
        $user = User::where('email', $request->email)->first();

        


        if($user && Hash::check($request->mot_de_pass, $user->mot_de_pass)){
            $user->tokens()->delete();
             $token = $user->createToken('nouveau_token')->plainTextToken;

              return response()->json([
                'message' => 'connexion reussi !',
                'token' => $token
            ]);
        }else{
            return response()->json(['message'=>'donnees invalide !']);
        }
    }
}
