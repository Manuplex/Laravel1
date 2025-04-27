<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Produit;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $panier = session()->get('panier', []);

        return view('client.panier', ['produits' => $panier]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produitsDisponibles = Produit::all();
        return view('panier.create', compact('produitsDisponibles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
        ]);

        $produit = Produit::find($request->produit_id);
        $panier = session()->get('panier', []);

        // Si le produit existe déjà dans le panier, on incrémente sa quantité
        if (isset($panier[$produit->id])) {
            $panier[$produit->id]['quantite'] += $request->quantite;
        } else {
            // Sinon, on l'ajoute
            $panier[$produit->id] = [
                'produit' => $produit,
                'quantite' => $request->quantite,
            ];
        }

        session()->put('panier', $panier);

        return redirect()->route('panier.index')->with('success', 'Produit ajouté au panier.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Panier $paniers)
    {
        //return view('paniers.show', compact('panier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panier $paniers)
    {
        return view('paniers.edit', compact('panier'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Panier $paniers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Récupérer le panier actuel de la session
        $produits = session('panier', []);

        // Vérifier si le produit existe dans le panier
        $produits = array_filter($produits, function ($item) use ($id) {
            return $item['produit']->id != $id; // Conserver uniquement les produits qui ne correspondent pas à l'ID
        });

        // Sauvegarder le panier mis à jour dans la session
        session(['panier' => $produits]);

        // Retourner à la page du panier avec un message de succès
        return redirect()->route('panier.index')->with('success', 'Produit supprimé du panier.');
    }
}
