<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;

class ActivityController extends Controller
{
    
    public function showAll()
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

   
}
