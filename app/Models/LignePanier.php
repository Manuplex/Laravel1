<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LignePanier extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'quantite'
    ];
    public function panier()
    {
        return $this->belongsTo(Panier::class, 'panier_id');
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
