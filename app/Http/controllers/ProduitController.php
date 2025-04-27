<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $produits = Produit::all();
        $produits = Produit::get();
        $data = ['produits' => $produits];
        return view('client.produit', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $produits = Produit::all();
        // return view('panier.ajout', compact('produits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        Produit::create($request->all());
        return redirect()->route('produits.index')->with('succes', 'Produit creer avec succes.');
    */
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produits)
    {
        // return view('produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produits)
    {
        // return view('produits.edit', compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produits)
    {
        /*  $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        $produits->update($request->all());
        return redirect()->route('produits.index')->with('succes', 'Produit mis a jour avec succes.');
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produits)
    {
        /* $produits->delete();
        return redirect()->route('produits.index')->with('succes', 'Produit supprimer avec succes.');
        */
    }
}
