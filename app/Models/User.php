<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'nom',
        'email',
        'adresse',
        'telephone',
        'mot_de_passe'
    ];
    protected $hidden =
    [
        'mot_de_passe',
        'remember_token'
    ];
    // Relation avec les paniers
    public function paniers()
    {
        return $this->hasMany(Panier::class, 'user_id');
    }
    // Relation avec les commandes
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'user_id');
    }
}
