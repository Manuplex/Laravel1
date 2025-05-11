@extends('client.layout.main')
@section('titre_onglet', "Votre panier")
@section('titre_page', "Page des paniers")

@section('content')

<h1>Gestion du Panier</h1>

<!-- Affichage du panier -->
<section>
    <h2>Mon Panier</h2>
    @if (empty($produits))
    <p>Votre panier est vide.</p>
    @else
    <table border="1">
        <thead>
            <tr>
                <th>Nom du Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $item)
            <tr>
                <td>{{ $item['produit']->nom }}</td>
                <td>{{ $item['produit']->prix }} XOF</td>
                <td>{{ $item['quantite'] }}</td>
                <td>{{ $item['produit']->prix * $item['quantite'] }} XOF</td>
                <td>
                    <!-- Lien vers la modification -->
                    <a href="{{ route('panier.edit', $item['produit']->id) }}">Modifier</a>

                    <!-- Formulaire pour supprimer un produit -->
                    <form action="{{ route('panier.destroy', $item['produit']->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>
        <strong>Total Général : </strong>
        {{
                array_reduce($produits, function ($total, $item) {
                    return $total + $item['produit']->prix * $item['quantite'];
                }, 0)
            }} XOF
    </p>
    @endif
    <button>
        <a href="{{url('produit')}}">Ajouter un produit</a>
    </button> </br>
    </br>
    <button> <a href="">Payer</a></button>
</section>

@endsection
