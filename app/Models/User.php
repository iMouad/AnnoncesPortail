<?php

namespace App\Models;

use App\Models\annonce;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillable = ["name","birthday","phone","mail","images","password"];

     // Etablir la relation entre user et les annonces, chaque user peut avoir tant d'annonces
    public function annonces () {
    return $this->hasMany(annonce::class);

    }
}
