@extends('admin.layout')

@section('title', 'Gestion des Produits')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Gestion des Produits</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Liste des Produits</h6>
            <a href="{{ route('admin.produits.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nouveau Produit
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Marque</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produits as $produit)
                        <tr>
                            <td>{{ $produit->id }}</td>
                            <td>
                                <img src="{{ $produit->image_thumb }}" alt="{{ $produit->nom }}" 
                                     style="width: 60px; height: 60px; object-fit: cover;">
                            </td>
                            <td>{{ $produit->nom }}</td>
                            <td>{{ $produit->marque->nom }}</td>
                            <td>{{ $produit->categorie->nom }}</td>
                            <td>{{ $produit->prix_formate }}</td>
                            <td>{{ $produit->stock }}</td>
                            <td>
                                @if($produit->actif)
                                <span class="badge badge-success">Actif</span>
                                @else
                                <span class="badge badge-danger">Inactif</span>
                                @endif
                                @if($produit->en_vedette)
                                <span class="badge badge-primary ml-1">Vedette</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('produit.details', $produit->id) }}" 
                                       class="btn btn-info btn-sm" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.produits.edit', $produit) }}" 
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.produits.destroy', $produit) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Supprimer ce produit ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection