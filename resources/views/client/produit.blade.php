@extends('client.layout.main')
@section('titre_onglet', "Nos produits")
@section('titre_page', "Page des produits")

@section('content')
<h3>Votre panier</h3>
@if (session('success'))
<div>{{ session('success') }}</div>
@endif
<h2>Voici des produits</h2>
<ul>
    @foreach ($produits as $produit)
    <li>
        {{$produit->nom}} : {{$produit->prix}} FCFA<br>
        description : {{$produit->description}} <br>
        <form action="{{ route('panier.store') }}" method="post">
            @csrf
            <input type="number" id="user_id" name="user_id" value="1" hidden>
            <input type="number" id="produit_id" name="produit_id" value="{{$produit->id}}" hidden>
            <input type="number" id="quantite" name="quantite" min="1" value="1">
            <button type="submit"> Ajouter au panier </button>
        </form>
    </li>
    <br>
    @endforeach
</ul>
@endsection