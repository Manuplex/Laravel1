<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'date_commande',
        'statut',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function ligneCommandes()
    {
        return $this->hasMany(LigneCommande::class, 'commande_id');
    }
}
