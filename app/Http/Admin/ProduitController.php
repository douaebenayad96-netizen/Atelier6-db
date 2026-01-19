<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Marque;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::with(['categorie', 'marque'])->paginate(10);
        return view('admin.produits.index', compact('produits'));
    }

    public function create()
    {
        $categories = Categorie::all();
        $marques = Marque::all();
        return view('admin.produits.create', compact('categories', 'marques'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'marque_id' => 'required|exists:marques,id',
            'description' => 'required|string',
            'prix' => 'required|numeric|min:0',
            'image_main' => 'required|url',
            'image_thumb' => 'required|url',
            'stock' => 'required|integer|min:0'
        ]);

        Produit::create($validated);
        
        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit créé avec succès.');
    }

    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        $marques = Marque::all();
        return view('admin.produits.edit', compact('produit', 'categories', 'marques'));
    }

    public function update(Request $request, Produit $produit)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'marque_id' => 'required|exists:marques,id',
            'description' => 'required|string',
            'prix' => 'required|numeric|min:0',
            'image_main' => 'required|url',
            'image_thumb' => 'required|url',
            'stock' => 'required|integer|min:0',
            'en_vedette' => 'boolean',
            'actif' => 'boolean'
        ]);

        $produit->update($validated);
        
        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();
        
        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit supprimé avec succès.');
    }
}