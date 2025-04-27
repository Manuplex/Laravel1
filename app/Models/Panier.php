<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'quantite'
    ];
    // Relation avec les produits
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'ligne_panier', 'produit_id', 'panier_id');
    }
    // Relation avec user(utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')
            ->withpivot('quantite');
    }
}
