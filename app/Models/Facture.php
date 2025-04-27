<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'montant_total',
        'date_facture'
    ];
    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id');
    }
}
