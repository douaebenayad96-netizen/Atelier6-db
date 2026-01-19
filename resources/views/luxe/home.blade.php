@extends('luxe.layout')

@section('title', 'Accueil')

@section('content')
<section class="hero" 
         style="background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), 
                url('https://images.unsplash.com/photo-1539109136881-3be0616acf4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
                background-size: cover;
                background-position: center;">
    <div class="hero-content">
        <h1 class="hero-title">L'Art du <span>Détail</span></h1>
        <p class="hero-subtitle">Collection Automne-Hiver 2026</p>
        <a href="{{ route('collection') }}" class="hero-button">Découvrir</a>
    </div>
</section>

<section class="featured">
    <h2 class="section-title">Pièces Sélectionnées</h2>
    <div class="products-grid">
        @foreach($produits as $produit)
        <a href="{{ route('produit.details', $produit->id) }}" class="product-card">
            <div class="product-image">
                <div class="product-image-real" 
                     style="background-image: url('{{ $produit->image_thumb }}');">
                </div>
            </div>
            <div class="product-info">
                <h3>{{ $produit->marque->nom }}</h3>
                <p>{{ $produit->nom }}</p>
                <p class="price">{{ $produit->prix_formate }}</p>
            </div>
        </a>
        @endforeach
    </div>
</section>

@if($editorials->count() > 0)
<section class="editorial-preview">
    <div class="editorial-content">
        <h2>Le Magazine</h2>
        <p>Plongez dans l'univers de la création</p>
        <a href="{{ route('editorial') }}" class="editorial-link">
            Lire l'éditorial <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>
@endif
@endsection