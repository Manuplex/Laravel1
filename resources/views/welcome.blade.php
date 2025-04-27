@extends('client.layout.main')

@section('titre_onglet', 'Bienvenue')
@section('titre_page', 'Page d\'accueil')

@section('content')
    <h2>Bienvenue sur notre boutique</h2>
    <p>Explorez nos catégories et découvrez nos produits phares.</p>
    <a href="{{ route('produit.index') }}">Voir les produits</a>

    @endsection
