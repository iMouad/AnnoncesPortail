<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class annonce extends Model
{
    use HasFactory;

    protected $fillable = ["titre","desc","ville","adresse","images","user_id","confirmed","is_deleted"];
    protected $casts = [
        'image_path' => 'array',
    ];
    
    // Etablir la relation entre l'annonce et chaque user
    public function user() {
        $this->hasOne(User::class);
    }
}
