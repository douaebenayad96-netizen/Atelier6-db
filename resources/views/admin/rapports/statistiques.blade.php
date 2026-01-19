@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Statistiques</h1>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Produits</h5>
                    <p class="card-text text-muted">{{ \App\Models\Produit::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Catégories</h5>
                    <p class="card-text text-muted">{{ \App\Models\Categorie::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Éditoriaux</h5>
                    <p class="card-text text-muted">{{ \App\Models\Editorial::count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
