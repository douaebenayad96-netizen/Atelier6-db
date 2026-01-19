@extends('admin.layout')

@section('title', 'Nouveau Produit')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Créer un nouveau produit</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulaire de création</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.produits.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-8">
                        <!-- Informations de base -->
                        <div class="mb-4">
                            <h5 class="mb-3">Informations de base</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nom" class="form-label">Nom du produit *</label>
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                           id="nom" name="nom" value="{{ old('nom') }}" required>
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                           id="slug" name="slug" value="{{ old('slug') }}">
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Laisser vide pour générer automatiquement</small>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Description *</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
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
                                                {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
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
                                                {{ old('marque_id') == $marque->id ? 'selected' : '' }}>
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
                                           id="prix" name="prix" value="{{ old('prix') }}" required>
                                    @error('prix')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="stock" class="form-label">Stock *</label>
                                    <input type="number" min="0" 
                                           class="form-control @error('stock') is-invalid @enderror" 
                                           id="stock" name="stock" value="{{ old('stock', 0) }}" required>
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
                                          id="details_techniques" name="details_techniques" rows="3">{{ old('details_techniques') }}</textarea>
                                @error('details_techniques')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Séparez les détails par " · "</small>
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
                                           id="image_main" name="image_main" value="{{ old('image_main') }}" required>
                                    @error('image_main')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">URL de l'image principale (1200px)</small>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="image_thumb" class="form-label">Image miniature (URL) *</label>
                                    <input type="url" class="form-control @error('image_thumb') is-invalid @enderror" 
                                           id="image_thumb" name="image_thumb" value="{{ old('image_thumb') }}" required>
                                    @error('image_thumb')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">URL de la miniature (600px)</small>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="images" class="form-label">Images additionnelles (URLs)</label>
                                    <textarea class="form-control @error('images') is-invalid @enderror" 
                                              id="images" name="images" rows="3" 
                                              placeholder="Une URL par ligne">{{ old('images') }}</textarea>
                                    @error('images')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Une URL par ligne (format JSON)</small>
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
                                           value="1" {{ old('en_vedette') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="en_vedette">
                                        Mettre en vedette
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="actif" name="actif" 
                                           value="1" {{ old('actif', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="actif">
                                        Produit actif
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Aperçu -->
                        <div class="card">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Aperçu</h6>
                            </div>
                            <div class="card-body text-center">
                                <div id="imagePreview" class="mb-3" style="height: 200px; background: #f8f9fa; 
                                      display: flex; align-items: center; justify-content: center;">
                                    <span class="text-muted">Aperçu de l'image</span>
                                </div>
                                <small class="text-muted">L'aperçu se mettra à jour automatiquement</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Créer le produit
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
    const preview = document.getElementById('imagePreview');
    if (this.value) {
        preview.style.backgroundImage = `url('${this.value}')`;
        preview.style.backgroundSize = 'cover';
        preview.style.backgroundPosition = 'center';
        preview.innerHTML = '';
    } else {
        preview.style.backgroundImage = 'none';
        preview.innerHTML = '<span class="text-muted">Aperçu de l\'image</span>';
    }
});

// Validation
document.querySelector('form').addEventListener('submit', function(e) {
    const requiredFields = ['nom', 'description', 'categorie_id', 'marque_id', 'prix', 'image_main', 'image_thumb'];
    let valid = true;
    
    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            valid = false;
        }
    });
    
    if (!valid) {
        e.preventDefault();
        alert('Veuillez remplir tous les champs obligatoires (*)');
    }
});
</script>
@endsection