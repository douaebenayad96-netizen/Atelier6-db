@extends('admin.layout')

@section('title', 'Tableau de bord')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Tableau de bord</h1>
    
    <!-- Statistiques -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Produits
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ \App\Models\Produit::count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tshirt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Catégories
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ \App\Models\Categorie::count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Marques
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ \App\Models\Marque::count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Éditoriaux
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ \App\Models\Editorial::count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Derniers produits -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Derniers produits ajoutés</h6>
                    <a href="{{ route('admin.produits.index') }}" class="btn btn-sm btn-primary">
                        Voir tous
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Marque</th>
                                    <th>Catégorie</th>
                                    <th>Prix</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Models\Produit::latest()->limit(5)->get() as $produit)
                                <tr>
                                    <td>{{ $produit->nom }}</td>
                                    <td>{{ $produit->marque->nom }}</td>
                                    <td>{{ $produit->categorie->nom }}</td>
                                    <td>{{ $produit->prix_formate }}</td>
                                    <td>{{ $produit->created_at->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions rapides -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Actions rapides</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.produits.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nouveau produit
                        </a>
                        <a href="{{ route('collection') }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> Voir la collection
                        </a>
                        <a href="{{ route('editorial') }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-newspaper"></i> Voir l'éditorial
                        </a>
                        <a href="{{ route('home') }}" target="_blank" class="btn btn-success">
                            <i class="fas fa-external-link-alt"></i> Visiter le site
                        </a>
                    </div>
                </div>
            </div>

            <!-- Derniers éditoriaux -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Derniers éditoriaux</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach(\App\Models\Editorial::latest()->limit(3)->get() as $editorial)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ Str::limit($editorial->titre, 30) }}</span>
                            <span class="badge bg-primary rounded-pill">
                                {{ $editorial->date_publication->format('d/m') }}
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection