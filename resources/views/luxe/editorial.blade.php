@extends('luxe.layout')

@section('title', 'Éditorial')

@section('content')
<section class="editorial-page">
    

    <!-- Articles Éditoriaux -->
    <div class="editorial-articles">
        @foreach($editorials as $index => $article)
        <article class="editorial-article {{ $index % 2 == 0 ? '' : 'reverse' }}">
            <div class="article-image">
                <div class="article-image-real" 
                     style="background-image: url('{{ $article->image }}');">
                    <div class="article-image-overlay">
                        <span class="article-category">{{ $article->categorie }}</span>
                        <span class="article-date">{{ $article->date_publication->format('F Y') }}</span>
                    </div>
                </div>
            </div>
            
            <div class="article-content">
                <span class="article-number">0{{ $index + 1 }}</span>
                <h2>{{ $article->titre }}</h2>
                <p class="article-excerpt">
                    {{ Str::limit($article->contenu, 250) }}
                </p>
                <div class="article-meta">
                    <span class="read-time">
                        <i class="far fa-clock"></i> {{ $article->temps_lecture }} min de lecture
                    </span>
                    <span class="author">
                        <i class="far fa-user"></i> Par {{ $article->auteur }}
                    </span>
                </div>
                <a href="#" class="article-link">
                    Lire l'article complet <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </article>
        @endforeach
    </div>

    <!-- Galerie additionnelle -->
    <div class="editorial-gallery">
        <h3>Instants de Création</h3>
        <div class="gallery-grid">
            <div class="gallery-item">
                <div class="gallery-image" 
                     style="background-image: url('https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                </div>
                <p>Atelier de broderie</p>
            </div>
            <div class="gallery-item">
                <div class="gallery-image" 
                     style="background-image: url('https://images.unsplash.com/photo-1519457431-44ccd64a579b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                </div>
                <p>Tissus en détail</p>
            </div>
            <div class="gallery-item">
                <div class="gallery-image" 
                     style="background-image: url('https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                </div>
                <p>Essayage collection</p>
            </div>
        </div>
    </div>

    <!-- Newsletter -->
    <div class="editorial-newsletter">
        <h2>Restez informé</h2>
        <p>Recevez nos éditoriaux et invitations exclusives</p>
        <form class="newsletter-form">
            <input type="email" placeholder="Votre adresse email" required>
            <button type="submit">S'abonner</button>
        </form>
        <p class="newsletter-note">
            <i class="fas fa-lock"></i> Vos données sont confidentielles
        </p>
    </div>
</section>

<style>
.editorial-page {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
}

.editorial-hero {
    height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    position: relative;
    margin-bottom: 4rem;
}

.hero-overlay {
    position: relative;
    z-index: 2;
    max-width: 800px;
    padding: 2rem;
}

.editorial-hero h1 {
    font-size: 5rem;
    margin-bottom: 1.5rem;
    letter-spacing: 4px;
    font-weight: 300;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.editorial-hero p {
    font-size: 1.5rem;
    letter-spacing: 3px;
    font-weight: 300;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
}

.article-image-overlay {
    position: absolute;
    top: 2rem;
    left: 2rem;
    display: flex;
    flex-direction: column;
    gap: 0.8rem;
}

.article-category {
    background: white;
    color: #1a1a1a;
    padding: 0.5rem 1.5rem;
    font-size: 0.8rem;
    letter-spacing: 2px;
    text-transform: uppercase;
    display: inline-block;
    max-width: fit-content;
}

.article-date {
    background: rgba(0,0,0,0.8);
    color: white;
    padding: 0.5rem 1.5rem;
    font-size: 0.8rem;
    letter-spacing: 1px;
    max-width: fit-content;
}

.article-meta {
    display: flex;
    gap: 2rem;
    margin: 2rem 0;
    color: #666;
    font-size: 0.9rem;
}

.article-meta i {
    margin-right: 0.5rem;
}

.editorial-gallery {
    margin: 6rem 0;
    padding: 4rem 0;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
}

.editorial-gallery h3 {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 3rem;
    letter-spacing: 3px;
    font-weight: 300;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 3rem;
    max-width: 1200px;
    margin: 0 auto;
}

.gallery-image {
    width: 100%;
    height: 250px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin-bottom: 1.5rem;
    transition: transform 0.5s ease;
}

.gallery-item:hover .gallery-image {
    transform: scale(1.05);
}

.gallery-item p {
    text-align: center;
    color: #666;
    font-size: 1rem;
    letter-spacing: 1px;
}

.newsletter-note {
    text-align: center;
    margin-top: 1.5rem;
    color: #999;
    font-size: 0.9rem;
}

.newsletter-note i {
    margin-right: 0.5rem;
}
</style>
@endsection