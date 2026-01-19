<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - ÉLÉGANCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        
        .register-card {
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .register-header h1 {
            font-size: 2rem;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
        }
        
        .register-header p {
            color: #666;
            font-size: 0.9rem;
        }
        
        .btn-primary {
            background: #1a1a1a;
            border: none;
            padding: 0.8rem;
            font-weight: 500;
        }
        
        .btn-primary:hover {
            background: #333;
        }
        
        .register-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="register-card">
        <div class="register-header">
            <h1>ÉLÉGANCE</h1>
            <p>Créer un compte administrateur</p>
        </div>
        
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
        @endif
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Nom complet</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                       id="password" name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Minimum 8 caractères</small>
            </div>
            
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <input type="password" class="form-control" 
                       id="password_confirmation" name="password_confirmation" required>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
        </form>
        
        <div class="register-footer">
            <p>Déjà un compte ? <a href="{{ route('login') }}" class="text-decoration-none">Se connecter</a></p>
            <p><a href="{{ route('home') }}" class="text-decoration-none">Retour au site</a></p>
        </div>
    </div>
</body>
</html>