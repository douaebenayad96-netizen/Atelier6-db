@extends('luxe.layout')

@section('content')
<div class="container py-5">
    <h1>{{ $marque->nom ?? 'Marque' }}</h1>
    
    <div class="row mt-4">
        @if($produits->isEmpty())
            <div class="col-12">
                <p class="text-muted">Aucun produit de cette marque.</p>
            </div>
        @else
            @foreach($produits as $produit)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $produit->image_thumb }}" class="card-img-top" alt="{{ $produit->nom }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produit->nom }}</h5>
                            <p class="card-text text-muted">{{ $produit->categorie->nom ?? 'Sans catégorie' }}</p>
                            <p class="card-text text-danger fw-bold">{{ $produit->prix_formate }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('produit.details', $produit->id) }}" class="btn btn-sm btn-outline-dark w-100">Voir détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
