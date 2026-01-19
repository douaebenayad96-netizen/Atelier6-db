<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Marque;
use App\Models\Categorie;
use App\Models\Editorial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LuxeController extends Controller
{
    // Page d'accueil
    public function home()
    {
        $produits = Produit::enVedette()->limit(3)->get();
        $editorials = Editorial::publie()->orderBy('date_publication', 'desc')->limit(2)->get();
        
        return view('luxe.home', compact('produits', 'editorials'));
    }

    // Page collection
    public function collection(Request $request)
    {
        $categorieSlug = $request->get('categorie');
        
        if ($categorieSlug) {
            $categorie = Categorie::where('slug', $categorieSlug)->first();
            $produits = $categorie ? Produit::where('categorie_id', $categorie->id)->actif()->get() : Produit::actif()->get();
        } else {
            $produits = Produit::actif()->get();
        }
        
        $categories = Categorie::all();
        
        return view('luxe.collection', compact('produits', 'categories'));
    }

    // Page détails produit
    public function details(int $id)
    {
        $produit = Produit::with(['categorie', 'marque'])->findOrFail($id);
        $produitsSimilaires = $produit->produitsSimilaires(3);
        $tousProduits = Produit::actif()->where('id', '!=', $id)->limit(3)->get();
        
        // Données pour les options
        $tailles = ['XS', 'S', 'M', 'L', 'XL'];
        $couleurs = [
            ['nom' => 'Noir', 'code' => '#1a1a1a'],
            ['nom' => 'Écru', 'code' => '#f5f5dc'],
            ['nom' => 'Bordeaux', 'code' => '#800000']
        ];
        
        $detailsComplets = [
            'Composition' => '100% Cachemire',
            'Origine' => 'Fabriqué en Italie',
            'Entretien' => 'Nettoyage à sec uniquement',
            'Poids' => '450g',
            'Dimensions' => 'Longueur: 75cm, Largeur: 52cm'
        ];
        
        $avis = [
            ['nom' => 'Sophie D.', 'note' => 5, 'commentaire' => 'Exceptionnel. La matière est divine.', 'date' => '15/10/2024'],
            ['nom' => 'Marie L.', 'note' => 4, 'commentaire' => 'Très belle coupe, légèrement grand.', 'date' => '10/10/2024']
        ];

        return view('luxe.details', compact(
            'produit',
            'produitsSimilaires',
            'tousProduits',
            'tailles',
            'couleurs',
            'detailsComplets',
            'avis'
        ));
    }

    // Page éditorial
    public function editorial()
    {
        $editorials = Editorial::publie()->get();
        
        return view('luxe.editorial', compact('editorials'));
    }

    // Page contact
    public function contact()
    {
        return view('luxe.contact');
    }
    
    // ... méthodes existantes (home, collection, details, editorial, contact) ...
    
    // ============ NOUVELLES MÉTHODES ============
    
    // Recherche
    public function recherche(Request $request)
    {
        $query = $request->input('q', '');
        
        $produits = !empty($query) 
            ? Produit::where(function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            })->where('actif', true)->get()
            : collect();
            
        return view('luxe.recherche', compact('produits', 'query'));
    }
    
    // Produits par catégorie
    public function categorie(string $slug)
    {
        $categorie = Categorie::where('slug', $slug)->firstOrFail();
        $produits = Produit::where('categorie_id', $categorie->id)
            ->where('actif', true)
            ->get();
            
        return view('luxe.categorie', compact('categorie', 'produits'));
    }
    
    // Produits par marque
    public function marque(string $slug)
    {
        $marque = Marque::where('slug', $slug)->firstOrFail();
        $produits = Produit::where('marque_id', $marque->id)
            ->where('actif', true)
            ->get();
            
        return view('luxe.marque', compact('marque', 'produits'));
    }
    
    // ============ API METHODS ============
    
    public function apiProduits()
    {
        $produits = Produit::with(['categorie', 'marque'])
            ->where('actif', true)
            ->get()
            ->map(function ($produit) {
                return [
                    'id' => $produit->id,
                    'nom' => $produit->nom,
                    'marque' => $produit->marque?->nom ?? 'N/A',
                    'categorie' => $produit->categorie?->nom ?? 'N/A',
                    'prix' => $produit->prix,
                    'prix_formate' => $produit->prix_formate,
                    'image_thumb' => $produit->image_thumb,
                    'slug' => $produit->slug,
                ];
            });
            
        return response()->json($produits);
    }
    
    public function apiProduitDetails(int $id)
    {
        $produit = Produit::with(['categorie', 'marque'])
            ->findOrFail($id);
            
        return response()->json([
            'id' => $produit->id,
            'nom' => $produit->nom,
            'marque' => $produit->marque->nom,
            'categorie' => $produit->categorie->nom,
            'description' => $produit->description,
            'prix' => $produit->prix,
            'prix_formate' => $produit->prix_formate,
            'image_main' => $produit->image_main,
            'image_thumb' => $produit->image_thumb,
            'images' => $produit->images,
            'details_techniques' => $produit->details_techniques,
            'stock' => $produit->stock,
        ]);
    }
    
    public function apiProduitsByCategorie(int $categorieId)
    {
        $produits = Produit::with(['categorie', 'marque'])
            ->where('categorie_id', $categorieId)
            ->where('actif', true)
            ->get()
            ->map(function ($produit) {
                return [
                    'id' => $produit->id,
                    'nom' => $produit->nom,
                    'marque' => $produit->marque?->nom ?? 'N/A',
                    'prix' => $produit->prix,
                    'prix_formate' => $produit->prix_formate,
                    'image_thumb' => $produit->image_thumb,
                ];
            });
            
        return response()->json($produits);
    }
    
    public function apiEditorials()
    {
        $editorials = Editorial::where('publie', true)
            ->orderBy('date_publication', 'desc')
            ->get()
            ->map(function ($editorial) {
                return [
                    'id' => $editorial->id,
                    'titre' => $editorial->titre,
                    'contenu' => Str::limit($editorial->contenu, 200),
                    'image' => $editorial->image,
                    'categorie' => $editorial->categorie,
                    'auteur' => $editorial->auteur,
                    'date_publication' => $editorial->date_publication?->format('d/m/Y') ?? '',
                ];
            });
            
        return response()->json($editorials);
    }
    
    public function apiSearch(Request $request)
    {
        $query = $request->get('q', '');
        
        if (empty($query)) {
            return response()->json([]);
        }
        
        $produits = Produit::where(function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->where('actif', true)
            ->get()
            ->map(function ($produit) {
                return [
                    'id' => $produit->id,
                    'nom' => $produit->nom,
                    'marque' => $produit->marque?->nom ?? 'N/A',
                    'prix' => $produit->prix_formate,
                    'image_thumb' => $produit->image_thumb,
                    'url' => route('produit.details', $produit->id),
                ];
            });
            
        return response()->json($produits);
    }
}
