@extends('luxe.layout')

@section('title', 'Détails - ' . $produit->nom)

@section('scripts')
<script src="{{ asset('js/product-options.js') }}"></script>
@endsection

@section('content')
<div class="product-details-page">
    <nav class="breadcrumb">
        <a href="{{ route('home') }}">Accueil</a>
        <span>/</span>
        <a href="{{ route('collection') }}">Collection</a>
        <span>/</span>
        <a href="#">{{ $produit->categorie->nom }}</a>
        <span>/</span>
        <span class="current">{{ $produit->nom }}</span>
    </nav>

    <div class="details-main">
        <div class="details-gallery">
            <div class="main-image">
                <div class="product-image-real-details" 
                     style="background-image: url('{{ $produit->image_main }}');">
                </div>
            </div>
            
            <div class="thumbnail-grid">
                <div class="thumbnail active">
                    <div class="thumbnail-real" 
                         style="background-image: url('{{ $produit->image_thumb }}');">
                    </div>
                </div>
                
                @if(is_array($produit->images) && count($produit->images) > 0)
                @foreach($produit->images as $index => $image)
                @if($index < 2)
                <div class="thumbnail">
                    <div class="thumbnail-real" 
                         style="background-image: url('{{ $image }}');">
                    </div>
                </div>
                @endif
                @endforeach
                @endif
                
                <div class="thumbnail video-thumbnail">
                    <div class="thumbnail-placeholder">
                        <i class="fas fa-play"></i> VIDÉO
                    </div>
                </div>
            </div>
        </div>

        <div class="details-info">
            <div class="details-header">
                <div class="brand-section">
                    <h1 class="product-brand">{{ $produit->marque->nom }}</h1>
                    <span class="product-ref">REF: {{ strtoupper(substr($produit->marque->nom, 0, 3)) }}-{{ $produit->id }}24</span>
                </div>
                <h2 class="product-title">{{ $produit->nom }}</h2>
                <div class="price-section">
                    <p class="product-price">{{ $produit->prix_formate }}</p>
                    <p class="price-note">TVA incluse, frais de livraison en sus</p>
                </div>
            </div>

            <div class="details-description">
                <h3>Description</h3>
                <p>{{ $produit->description }}</p>
                <div class="highlight-features">
                    <div class="feature">
                        <i class="fas fa-check"></i>
                        <span>Pièce unique numérotée</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-check"></i>
                        <span>Confection artisanale</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-check"></i>
                        <span>Matière premium</span>
                    </div>
                </div>
            </div>

            <div class="details-options">
                <div class="option-section">
                    <h4>Couleur</h4>
                    <div class="color-selector">
                        @foreach($couleurs as $couleur)
                        <div class="color-option {{ $loop->first ? 'selected' : '' }}" 
                             style="background-color: {{ $couleur['code'] }}"
                             title="{{ $couleur['nom'] }}">
                            @if($loop->first)
                            <i class="fas fa-check"></i>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="option-section">
                    <h4>Taille</h4>
                    <div class="size-selector">
                        @foreach($tailles as $taille)
                        <div class="size-option {{ $loop->index === 2 ? 'selected' : '' }}">
                            {{ $taille }}
                        </div>
                        @endforeach
                    </div>
                    <a href="#" class="size-guide-link">
                        <i class="fas fa-ruler"></i> Guide des tailles
                    </a>
                </div>

                <div class="option-section">
                    <h4>Quantité</h4>
                    <div class="quantity-selector">
                        <button class="quantity-btn minus">-</button>
                        <input type="text" value="1" class="quantity-input" readonly>
                        <button class="quantity-btn plus">+</button>
                    </div>
                </div>
            </div>

            <div class="details-actions">
                <button class="add-to-cart-btn">
                    <i class="fas fa-shopping-bag"></i>
                    Ajouter au panier
                </button>
                
                <button class="wishlist-btn-details">
                    <i class="far fa-heart"></i>
                    Ajouter à la wishlist
                </button>
                
                <button class="consultant-btn">
                    <i class="fas fa-user"></i>
                    Conseiller personnel
                </button>
            </div>

            <div class="details-services">
                <div class="service">
                    <i class="fas fa-truck"></i>
                    <div>
                        <strong>Livraison gratuite</strong>
                        <p>Sous 2-3 jours ouvrés</p>
                    </div>
                </div>
                <div class="service">
                    <i class="fas fa-undo"></i>
                    <div>
                        <strong>Retours gratuits</strong>
                        <p>Sous 30 jours</p>
                    </div>
                </div>
                <div class="service">
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <strong>Authenticité garantie</strong>
                        <p>Certificat inclus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="details-tabs">
        <div class="tabs-header">
            <button class="tab-btn active" data-tab="specs">Détails techniques</button>
            <button class="tab-btn" data-tab="lookbook">Lookbook</button>
            <button class="tab-btn" data-tab="reviews">Avis clients</button>
            <button class="tab-btn" data-tab="shipping">Livraison & Retours</button>
        </div>
        
        <div class="tabs-content">
            <div class="tab-pane active" id="specs">
                <div class="specs-grid">
                    @if($produit->details_techniques)
                    @foreach(explode(' · ', $produit->details_techniques) as $detail)
                    @php
                        $parts = explode(': ', $detail);
                        $key = $parts[0] ?? '';
                        $value = $parts[1] ?? $detail;
                    @endphp
                    <div class="spec-item">
                        <span class="spec-key">{{ $key }}</span>
                        <span class="spec-value">{{ $value }}</span>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

            <div class="tab-pane" id="lookbook">
                <h4>Complétez votre look</h4>
                <div class="lookbook-grid">
                    @if($produitsSimilaires->count() > 0)
                    @foreach($produitsSimilaires as $produitSimilaire)
                    <div class="look-item">
                        <div class="look-image">
                            <div class="look-image-real" 
                                 style="background-image: url('{{ $produitSimilaire->image_thumb }}');">
                            </div>
                        </div>
                        <div class="look-info">
                            <p>{{ $produitSimilaire->nom }}</p>
                            <a href="{{ route('produit.details', $produitSimilaire->id) }}" class="look-link">
                                Voir le produit <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

            <div class="tab-pane" id="reviews">
                <div class="reviews-header">
                    <div class="rating-overview">
                        <div class="average-rating">
                            <span class="rating-stars">
                                @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star"></i>
                                @endfor
                            </span>
                            <span class="rating-score">4.5/5</span>
                        </div>
                        <p>Basé sur 24 avis clients</p>
                    </div>
                    <button class="add-review-btn">Écrire un avis</button>
                </div>
                
                <div class="reviews-list">
                    @foreach($avis as $avisItem)
                    <div class="review-item">
                        <div class="review-header">
                            <span class="reviewer-name">{{ $avisItem['nom'] }}</span>
                            <span class="review-date">{{ $avisItem['date'] }}</span>
                        </div>
                        <div class="review-rating">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $avisItem['note'] ? 'filled' : '' }}"></i>
                            @endfor
                        </div>
                        <p class="review-comment">{{ $avisItem['commentaire'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="tab-pane" id="shipping">
                <div class="shipping-info">
                    <h4>Options de livraison</h4>
                    <div class="shipping-options">
                        <div class="shipping-option">
                            <strong>Express (24h)</strong>
                            <p>25€ - Livraison avant 13h le lendemain</p>
                        </div>
                        <div class="shipping-option">
                            <strong>Standard (2-3 jours)</strong>
                            <p>Gratuit à partir de 500€ d'achat</p>
                        </div>
                        <div class="shipping-option">
                            <strong>Click & Collect</strong>
                            <p>Gratuit - Retrait en boutique</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($tousProduits->count() > 0)
    <div class="related-products">
        <h3>Vous aimerez aussi</h3>
        <div class="related-grid">
            @foreach($tousProduits as $produitSimilaire)
            <a href="{{ route('produit.details', $produitSimilaire->id) }}" class="related-item">
                <div class="related-image">
                    <div class="related-image-real" 
                         style="background-image: url('{{ $produitSimilaire->image_thumb }}');">
                    </div>
                </div>
                <div class="related-info">
                    <p class="related-brand">{{ $produitSimilaire->marque->nom }}</p>
                    <p class="related-name">{{ $produitSimilaire->nom }}</p>
                    <p class="related-price">{{ $produitSimilaire->prix_formate }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection