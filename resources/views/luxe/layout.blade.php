<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÉLÉGANCE | @yield('title', 'Haute Couture')</title>
    <link rel="stylesheet" href="{{ asset('css/luxe.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="nav-luxe">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">ÉLÉGANCE</a>
            <div class="nav-links">
                <a href="{{ route('home') }}">Accueil</a>
                <a href="{{ route('collection') }}">Collection</a>
                <a href="{{ route('editorial') }}">Éditorial</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
            <div class="nav-icons">
                <a href="#" class="nav-icon"><i class="far fa-heart"></i></a>
                <a href="#" class="nav-icon"><i class="fas fa-shopping-bag"></i></a>
                <a href="#" class="nav-icon"><i class="far fa-user"></i></a>
            </div>
        </div>
    </nav>

    <!-- Contenu -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-luxe">
        <div class="footer-content">
            <div class="footer-section">
                <h3>ÉLÉGANCE</h3>
                <p>Paris · Milan · Tokyo</p>
                <p>contact@elegance-luxe.com</p>
            </div>
            
            <div class="footer-section">
                <h4>Services</h4>
                <a href="#">Conseil personnalisé</a>
                <a href="#">Livraison internationale</a>
                <a href="#">Retours & Échanges</a>
                <a href="#">Guide des tailles</a>
            </div>
            
            <div class="footer-section">
                <h4>À propos</h4>
                <a href="#">Notre histoire</a>
                <a href="#">Nos ateliers</a>
                <a href="#">Carrières</a>
                <a href="#">Presse</a>
            </div>
            
            <div class="footer-section">
                <h4>Newsletter</h4>
                <p>Inscrivez-vous pour recevoir nos nouveautés</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Votre email" required>
                    <button type="submit"><i class="fas fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2026 ÉLÉGANCE Haute Couture. Tous droits réservés.</p>
            <div class="footer-social">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>