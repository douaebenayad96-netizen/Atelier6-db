@extends('admin.layout')

@section('title', 'Modifier le Produit')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Modifier le produit</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulaire de modification</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.produits.update', $produit) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-8">
                        <!-- Informations de base -->
                        <div class="mb-4">
                            <h5 class="mb-3">Informations de base</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nom" class="form-label">Nom du produit *</label>
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                           id="nom" name="nom" value="{{ old('nom', $produit->nom) }}" required>
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                           id="slug" name="slug" value="{{ old('slug', $produit->slug) }}">
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Description *</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="4" required>{{ old('description', $produit->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Catégorie et Marque -->
                        <div class="mb-4">
                            <h5 class="mb-3">Classification</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="categorie_id" class="form-label">Catégorie *</label>
                                    <select class="form-control @error('categorie_id') is-invalid @enderror" 
                                            id="categorie_id" name="categorie_id" required>
                                        <option value="">Sélectionner une catégorie</option>
                                        @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}" 
                                                {{ old('categorie_id', $produit->categorie_id) == $categorie->id ? 'selected' : '' }}>
                                            {{ $categorie->nom }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('categorie_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="marque_id" class="form-label">Marque *</label>
                                    <select class="form-control @error('marque_id') is-invalid @enderror" 
                                            id="marque_id" name="marque_id" required>
                                        <option value="">Sélectionner une marque</option>
                                        @foreach($marques as $marque)
                                        <option value="{{ $marque->id }}" 
                                                {{ old('marque_id', $produit->marque_id) == $marque->id ? 'selected' : '' }}>
                                            {{ $marque->nom }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('marque_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Prix et Stock -->
                        <div class="mb-4">
                            <h5 class="mb-3">Prix et Stock</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="prix" class="form-label">Prix (€) *</label>
                                    <input type="number" step="0.01" min="0" 
                                           class="form-control @error('prix') is-invalid @enderror" 
                                           id="prix" name="prix" value="{{ old('prix', $produit->prix) }}" required>
                                    @error('prix')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="stock" class="form-label">Stock *</label>
                                    <input type="number" min="0" 
                                           class="form-control @error('stock') is-invalid @enderror" 
                                           id="stock" name="stock" value="{{ old('stock', $produit->stock) }}" required>
                                    @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Détails techniques -->
                        <div class="mb-4">
                            <h5 class="mb-3">Détails techniques</h5>
                            <div class="mb-3">
                                <label for="details_techniques" class="form-label">Détails techniques</label>
                                <textarea class="form-control @error('details_techniques') is-invalid @enderror" 
                                          id="details_techniques" name="details_techniques" rows="3">{{ old('details_techniques', $produit->details_techniques) }}</textarea>
                                @error('details_techniques')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <!-- Images -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Images</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="image_main" class="form-label">Image principale (URL) *</label>
                                    <input type="url" class="form-control @error('image_main') is-invalid @enderror" 
                                           id="image_main" name="image_main" value="{{ old('image_main', $produit->image_main) }}" required>
                                    @error('image_main')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="image_thumb" class="form-label">Image miniature (URL) *</label>
                                    <input type="url" class="form-control @error('image_thumb') is-invalid @enderror" 
                                           id="image_thumb" name="image_thumb" value="{{ old('image_thumb', $produit->image_thumb) }}" required>
                                    @error('image_thumb')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="images" class="form-label">Images additionnelles</label>
                                    <textarea class="form-control @error('images') is-invalid @enderror" 
                                              id="images" name="images" rows="3">{{ old('images', is_array($produit->images) ? implode("\n", $produit->images) : '') }}</textarea>
                                    @error('images')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="text-center mt-3">
                                    <img src="{{ $produit->image_thumb }}" alt="Aperçu" 
                                         class="img-fluid rounded" style="max-height: 150px;">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Options -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Options</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="en_vedette" name="en_vedette" 
                                           value="1" {{ old('en_vedette', $produit->en_vedette) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="en_vedette">
                                        Mettre en vedette
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="actif" name="actif" 
                                           value="1" {{ old('actif', $produit->actif) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="actif">
                                        Produit actif
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Informations -->
                        <div class="card">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Informations</h6>
                            </div>
                            <div class="card-body">
                                <p><strong>Créé le:</strong> {{ $produit->created_at->format('d/m/Y H:i') }}</p>
                                <p><strong>Modifié le:</strong> {{ $produit->updated_at->format('d/m/Y H:i') }}</p>
                                <p><strong>ID:</strong> {{ $produit->id }}</p>
                                <p><strong>Référence:</strong> {{ strtoupper(substr($produit->marque->nom, 0, 3)) }}-{{ $produit->id }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Mettre à jour
                    </button>
                    <a href="{{ route('admin.produits.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Générer le slug automatiquement
document.getElementById('nom').addEventListener('input', function() {
    const slugInput = document.getElementById('slug');
    if (!slugInput.value) {
        const slug = this.value
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim();
        slugInput.value = slug;
    }
});

// Aperçu de l'image
document.getElementById('image_thumb').addEventListener('input', function() {
    const preview = document.querySelector('.card-body img');
    if (this.value) {
        preview.src = this.value;
    }
});
</script>
@endsection