<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - ÉLÉGANCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .login-header h1 {
            font-size: 2rem;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
        }
        
        .login-header p {
            color: #666;
            font-size: 0.9rem;
        }
        
        .form-control:focus {
            border-color: #1a1a1a;
            box-shadow: 0 0 0 0.2rem rgba(26, 26, 26, 0.25);
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
        
        .login-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <h1>ÉLÉGANCE</h1>
            <p>Administration</p>
        </div>
        
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email') }}" required autofocus>
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
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Se souvenir de moi</label>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
        </form>
        
        <div class="login-footer">
            <p>&copy; 2024 ÉLÉGANCE Haute Couture</p>
            <p><a href="{{ route('home') }}" class="text-decoration-none">Retour au site</a></p>
        </div>
    </div>
</body>
</html>