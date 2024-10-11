<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    
    public function index()
    {
        $activities = Activity::all();

        return response()->json([
            'activitats' => $activities
        ]);
        
        if ($activities->isEmpty()) {
            return response()->json(['message' => 'No hi ha activitats registrades'], 200);
        }
    }

    public function store(StoreActivityRequest $request)
    {
        $activity = new Activity;

             $activity->nom = $request->input('nom');
             $activity->descripcio = $request->input('descripcio');
             $activity->capacitat_maxima = $request->input('capacitat_maxima');
            
             $activity->save();
            return response()->json([
            'message' => 'Activitat registrada correctament',
            'activitat' => $activity
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
