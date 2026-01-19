<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'slug', 'contenu', 'image', 'categorie',
        'auteur', 'temps_lecture', 'date_publication', 'publie'
    ];

    protected $casts = [
        'date_publication' => 'date',
        'publie' => 'boolean'
    ];

    // Scope pour les articles publiés
    public function scopePublie($query)
    {
        return $query->where('publie', true);
    }

    // Scope pour les derniers articles
    public function scopeRecents($query, $limit = 3)
    {
        return $query->orderBy('date_publication', 'desc')->limit($limit);
    }
}