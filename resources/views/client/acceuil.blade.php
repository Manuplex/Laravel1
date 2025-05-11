@extends('client.layout.main')
@section('titre_onglet', "Acceuil")
@section('titre_page', "Page d'acceuil")

@section('content')
<h2>Listes des categories</h2>
<ul class="item-a">
    @foreach ($categories as $item)
    <li>
        {{$item->nom}}
    </li>
    @endforeach
</ul>
@endsection
