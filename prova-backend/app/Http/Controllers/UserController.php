<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
            $user = User::create($request->validated());

            return response()->json([
                'message' => 'Usuari registrat correctament',
                'usuari' => $user
            ], 201);
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
            $user = User::findOrFail($id);
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
