<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return response()->json(['message' => 'No hi ha usuaris registrats'], 200);
        }
    }
    
    public function store(StoreUserRequest $request)
    {
        try{
            $user = new User;

             $user->nom = $request->input('nom');
             $user->cognom = $request->input('cognom');
             $user->telefon = $request->input('telefon');
             $user->edat = $request->input('edat');
             $user->email = $request->input('email');

             $user->save();
            return response()->json([
            'message' => 'Usuari registrat correctament',
            'usuari' => $user
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error al registrar usuari',
            'error' => $e->getMessage(),
        ], 500);
    }
}
    
    public function show(string $id)
    {
        try {
            $user = User::findOrFail($id);
    
            return response()->json([
                'user' => $user
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Usuari no trobat'], 404);
        }
    }

    public function update(UpdateUserRequest $request, string $id)
    {
            $user = User::find($id);
            $validated = $request->validated();
            $user->update($validated);
    
            return response()->json([
                'message' => 'Usuari actualitzat correctament',
                'usuari' => $user
            ]);
        
    }

    public function destroy(string $id)
    {
    try{
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'Usuari eliminat satisfactòriament']);
        
    } catch (ModelNotFoundException $e) {
        return response()->json(['message' => 'Usuari no trobat'], 404);
    }
}
}
