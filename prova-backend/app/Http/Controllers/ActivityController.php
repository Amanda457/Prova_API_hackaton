<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\StoreActivityRequest;
use App\Models\User;

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

    public function bookActivity(Request $request)
    {
        $userId = $request->input('user_id');
        $activityId = $request->input('activity_id');

        try {
            $user = $this->findUserOrFail($userId);
            $activity = Activity::findOrFail($activityId);
            $activity->reserve($userId);

            return response()->json(['message' => 'Reserva creada correctamente']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Actividad no encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
