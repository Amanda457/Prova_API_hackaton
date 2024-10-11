<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Activity;


class User extends Model
{

    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['nom', 'cognom', 'telefon', 'edat', 'email'];

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }   
}
