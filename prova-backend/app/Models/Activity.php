<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';
    protected $fillable = ['nom', 'descripcio', 'capacitat_maxima'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function reserve($userId){

        $user = User::find($userId);

        if (!$user) {
            return ['success' => false, 'message' => 'Usuari no trobat',];
        }

        if ($this->users()->where('user_id', $userId)->exists()) {
            return ['success' => false, 'message' => 'Ja esta feta aquesta reserva',];
        }

        $this->users()->attach($userId);

        return [
            'success' => true,
            'message' => 'Reserva realitzada correctament',
        ];
    }
}
