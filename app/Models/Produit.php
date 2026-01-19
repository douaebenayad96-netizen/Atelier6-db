<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'slug', 'categorie_id', 'marque_id', 'description', 
        'prix', 'image_main', 'image_thumb', 'images', 
        'details_techniques', 'stock', 'en_vedette', 'actif'
    ];

    protected $casts = [
        'images' => 'array',
        'en_vedette' => 'boolean',
        'actif' => 'boolean',
        'prix' => 'decimal:2'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class);
    }

    // Scope pour les produits en vedette
    public function scopeEnVedette($query)
    {
        return $query->where('en_vedette', true)->where('actif', true);
    }

    // Scope pour les produits actifs
    public function scopeActif($query)
    {
        return $query->where('actif', true);
    }

    // Formatter le prix
    public function getPrixFormateAttribute()
    {
        return number_format($this->prix, 0, ',', ' ') . ' €';
    }

    // Obtenir les produits similaires (même catégorie)
    public function produitsSimilaires($limit = 3)
    {
        return self::where('categorie_id', $this->categorie_id)
            ->where('id', '!=', $this->id)
            ->where('actif', true)
            ->limit($limit)
            ->get();
    }
}