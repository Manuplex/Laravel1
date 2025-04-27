<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'nom',
        'description',
        'prix',
        'stock'
    ];
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
    // Relation avec les paniers
    public function paniers()
    {
        return $this->belongsToMany(Panier::class, 'ligne_panier', 'produit_id', 'panier_id')
                    ->withPivot('quantite');
    }
    // Relation avec les lignes de commandes
    public function ligneCommandes()
    {
        return $this->hasMany(LigneCommande::class, 'produit_id');
    }
}
