<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Admin\ProduitController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LuxeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ============================================
// ROUTES PUBLIQUES
// ============================================

Route::get('/', [LuxeController::class, 'home'])->name('home');
Route::get('/collection', [LuxeController::class, 'collection'])->name('collection');
Route::get('/produit/{id}', [LuxeController::class, 'details'])->name('produit.details');
Route::get('/editorial', [LuxeController::class, 'editorial'])->name('editorial');
Route::get('/contact', [LuxeController::class, 'contact'])->name('contact');

// Routes pour recherche et filtres (optionnel)
Route::get('/recherche', [LuxeController::class, 'recherche'])->name('recherche');
Route::get('/categorie/{slug}', [LuxeController::class, 'categorie'])->name('categorie');
Route::get('/marque/{slug}', [LuxeController::class, 'marque'])->name('marque');

// ============================================
// ROUTES AUTHENTIFICATION
// ============================================

// Routes d'authentification (simplifiées)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// ============================================
// ROUTES ADMIN (Protégées)
// ============================================

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Gestion des produits
    Route::resource('produits', ProduitController::class);
    
    // Catégories
    Route::get('/categories', function () {
        return view('admin.categories.index');
    })->name('categories.index');
    
    Route::get('/categories/create', function () {
        return view('admin.categories.create');
    })->name('categories.create');
    
    // Marques
    Route::get('/marques', function () {
        return view('admin.marques.index');
    })->name('marques.index');
    
    // Éditoriaux
    Route::get('/editorials', function () {
        return view('admin.editorials.index');
    })->name('editorials.index');
    
    // Commandes
    Route::get('/commandes', function () {
        return view('admin.commandes.index');
    })->name('commandes.index');
    
    // Clients
    Route::get('/clients', function () {
        return view('admin.clients.index');
    })->name('clients.index');
    
    // Rapports
    Route::get('/rapports/ventes', function () {
        return view('admin.rapports.ventes');
    })->name('rapports.ventes');
    
    Route::get('/rapports/statistiques', function () {
        return view('admin.rapports.statistiques');
    })->name('rapports.statistiques');
});

// ============================================
// ROUTES API (Pour AJAX)
// ============================================

Route::prefix('api')->group(function () {
    // API produits
    Route::get('/produits', [LuxeController::class, 'apiProduits']);
    Route::get('/produits/{id}', [LuxeController::class, 'apiProduitDetails']);
    Route::get('/produits/categorie/{categorieId}', [LuxeController::class, 'apiProduitsByCategorie']);
    
    // API éditoriaux
    Route::get('/editorials', [LuxeController::class, 'apiEditorials']);
    
    // API recherche
    Route::get('/search', [LuxeController::class, 'apiSearch']);
});


// ============================================
// ROUTES UTILITAIRES
// ============================================

// Route pour vider les caches (développement seulement)
Route::get('/clear-cache', function() {
    if (app()->environment('local')) {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        return "Cache cleared!";
    }
    return abort(404);
});



// ============================================
// ROUTES FALLBACK
// ============================================

// Redirection pour les anciennes URLs
Route::redirect('/index.php', '/');
Route::redirect('/home', '/');
Route::redirect('/accueil', '/');
Route::redirect('/products', '/collection');
Route::redirect('/shop', '/collection');
Route::redirect('/magazine', '/editorial');
Route::redirect('/blog', '/editorial');

// Page 404 personnalisée
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});