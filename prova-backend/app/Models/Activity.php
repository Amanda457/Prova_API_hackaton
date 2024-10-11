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
}
