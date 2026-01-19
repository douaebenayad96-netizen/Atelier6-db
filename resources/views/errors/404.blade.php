<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non trouvée - ÉLÉGANCE</title>
    <link rel="stylesheet" href="{{ asset('css/luxe.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="nav-luxe">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">ÉLÉGANCE</a>
        </div>
    </nav>

    <main>
        <div class="error-page">
            <div class="error-content">
                <div class="error-number">404</div>
                <h1>Page non trouvée</h1>
                <p>La page que vous recherchez semble introuvable.</p>
                <div class="error-actions">
                    <a href="{{ route('home') }}" class="error-btn">
                        <i class="fas fa-home"></i> Retour à l'accueil
                    </a>
                    <a href="{{ route('collection') }}" class="error-btn outline">
                        <i class="fas fa-tshirt"></i> Voir la collection
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer-luxe">
        <div class="footer-bottom">
            <p>&copy; 2024 ÉLÉGANCE Haute Couture. Tous droits réservés.</p>
        </div>
    </footer>

    <style>
    .error-page {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 80vh;
        padding: 2rem;
        text-align: center;
    }
    
    .error-content {
        max-width: 600px;
    }
    
    .error-number {
        font-size: 8rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 300;
        color: #eaeaea;
        line-height: 1;
        margin-bottom: 2rem;
    }
    
    .error-content h1 {
        font-size: 3rem;
        margin-bottom: 1.5rem;
        letter-spacing: 2px;
        font-weight: 300;
    }
    
    .error-content p {
        color: #666;
        font-size: 1.2rem;
        margin-bottom: 3rem;
        line-height: 1.6;
    }
    
    .error-actions {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .error-btn {
        padding: 1rem 2.5rem;
        background: #1a1a1a;
        color: white;
        text-decoration: none;
        border: none;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.9rem;
        letter-spacing: 1.5px;
        cursor: pointer;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
        text-transform: uppercase;
    }
    
    .error-btn:hover {
        background: #333;
        color: white;
        text-decoration: none;
    }
    
    .error-btn.outline {
        background: transparent;
        border: 1px solid #1a1a1a;
        color: #1a1a1a;
    }
    
    .error-btn.outline:hover {
        background: #1a1a1a;
        color: white;
    }
    
    @media (max-width: 768px) {
        .error-number {
            font-size: 6rem;
        }
        
        .error-content h1 {
            font-size: 2.5rem;
        }
        
        .error-actions {
            flex-direction: column;
        }
        
        .error-btn {
            width: 100%;
            justify-content: center;
        }
    }
    </style>
</body>
</html>