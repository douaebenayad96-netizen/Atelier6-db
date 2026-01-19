<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::with(['categorie', 'marque'])->get();
        return view('admin.produits.index', compact('produits'));
    }

    public function create()
    {
        return view('admin.produits.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Produit::create($validated);
        return redirect()->route('admin.produits.index');
    }

    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        return view('admin.produits.show', compact('produit'));
    }

    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        return view('admin.produits.edit', compact('produit'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $produit = Produit::findOrFail($id);
        $produit->update($validated);
        return redirect()->route('admin.produits.index');
    }

    public function destroy($id)
    {
        Produit::findOrFail($id)->delete();
        return redirect()->route('admin.produits.index');
    }
}
