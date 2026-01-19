@extends('luxe.layout')

@section('title', 'Collection')

@section('content')
<section class="collection-page">
    <div class="collection-hero">
        <h1>Collection A/W 2026</h1>
        <p>Pièces uniques, savoir-faire exceptionnel</p>
    </div>

    <div class="collection-filters">
        <div class="filter-container">
            <a href="{{ route('collection') }}" class="filter-btn {{ !request('categorie') ? 'active' : '' }}">Tous</a>
            @foreach($categories as $categorie)
            <a href="{{ route('collection', ['categorie' => $categorie->slug]) }}" class="filter-btn {{ request('categorie') == $categorie->slug ? 'active' : '' }}">{{ $categorie->nom }}</a>
            @endforeach
        </div>
    </div>

    <div class="collection-grid">
        @foreach($produits as $produit)
        <div class="collection-item">
            <a href="{{ route('produit.details', $produit->id) }}" class="item-link">
                <div class="item-image">
                    <div class="product-image-real" 
                         style="background-image: url('{{ $produit->image_thumb }}');">
                    </div>
                </div>
                <div class="item-info">
                    <div class="item-header">
                        <h3>{{ $produit->marque->nom }}</h3>
                        <p class="item-category">{{ $produit->categorie->nom }}</p>
                    </div>
                    <p class="item-name">{{ $produit->nom }}</p>
                    <p class="item-price">{{ $produit->prix_formate }}</p>
                    <button class="quick-view" data-id="{{ $produit->id }}">
                        Voir détails
                    </button>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    
</section>
@endsection