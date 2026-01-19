<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;
use App\Models\Marque;
use App\Models\Produit;
use App\Models\Editorial;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Catégories
        $categories = [
            ['nom' => 'Vestes', 'slug' => 'vestes'],
            ['nom' => 'Robes', 'slug' => 'robes'],
            ['nom' => 'Sacs', 'slug' => 'sacs'],
            ['nom' => 'Accessoires', 'slug' => 'accessoires'],
        ];

        foreach ($categories as $categorie) {
            Categorie::create($categorie);
        }

        // Marques
        $marques = [
            ['nom' => 'ÉLÉGANCE', 'slug' => 'elegance'],
            ['nom' => 'NOCTURNE', 'slug' => 'nocturne'],
            ['nom' => 'ARCHIVE', 'slug' => 'archive'],
            ['nom' => 'SILHOUETTE', 'slug' => 'silhouette'],
        ];

        foreach ($marques as $marque) {
            Marque::create($marque);
        }

        // Produits
        $produits = [
            [
                'nom' => 'Veste en Cachemire',
                'slug' => 'veste-cachemire',
                'categorie_id' => 1,
                'marque_id' => 1,
                'description' => 'Veste en cachemire pur, confectionnée à la main en Italie. Coupe structurée avec finitions en soie.',
                'prix' => 1250.00,
                'image_main' => 'https://images.unsplash.com/photo-1544022613-e87ca75a784a?w=1200&auto=format&fit=crop&q=60',
                'image_thumb' => 'https://images.unsplash.com/photo-1544022613-e87ca75a784a?w=600&auto=format&fit=crop&q=60',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1544022613-e87ca75a784a?w=800&auto=format',
                    'https://images.unsplash.com/photo-1552374196-1ab64f8cdb6c?w=800&auto=format'
                ]),
                'details_techniques' => '100% Cachemire · Fabriqué en Italie · Entretien à sec · Poids: 450g',
                'stock' => 15,
                'en_vedette' => true,
                'actif' => true
            ],
            [
                'nom' => 'Robe Soirée Sculptée',
                'slug' => 'robe-soiree-sculptee',
                'categorie_id' => 2,
                'marque_id' => 2,
                'description' => 'Robe longue en satin de soie avec découpes stratégiques. Dos nu et traîne légère.',
                'prix' => 3200.00,
                'image_main' => 'https://plus.unsplash.com/premium_photo-1675107360188-111441548390?w=1200&auto=format&fit=crop&q=60',
                'image_thumb' => 'https://plus.unsplash.com/premium_photo-1675107360188-111441548390?w=600&auto=format&fit=crop&q=60',
                'images' => json_encode([
                    'https://plus.unsplash.com/premium_photo-1675107360188-111441548390?w=800&auto=format',
                    'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=800&auto=format'
                ]),
                'details_techniques' => 'Soie naturelle · Broderies main · Unique pièce · Longueur: 150cm',
                'stock' => 8,
                'en_vedette' => true,
                'actif' => true
            ],
            [
                'nom' => 'Sac Portfolio',
                'slug' => 'sac-portfolio',
                'categorie_id' => 3,
                'marque_id' => 3,
                'description' => 'Sac en cuir de veau grainé, fermeture magnétique dissimulée. Compartiment tablette intégré.',
                'prix' => 2800.00,
                'image_main' => 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=1200&auto=format&fit=crop&q=60',
                'image_thumb' => 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=600&auto=format&fit=crop&q=60',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=800&auto=format',
                    'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=800&auto=format&crop=detail'
                ]),
                'details_techniques' => 'Cuir plein fleur · Laiton vieilli · Numéroté · Dimensions: 30x40x10cm',
                'stock' => 12,
                'en_vedette' => true,
                'actif' => true
            ],
            [
                'nom' => 'Blazer Oversize',
                'slug' => 'blazer-oversize',
                'categorie_id' => 1,
                'marque_id' => 4,
                'description' => 'Blazer oversize en laine vierge, épaules structurées et boutons dorés.',
                'prix' => 980.00,
                'image_main' => 'https://static.galerieslafayette.com/cdn-cgi/image/width=664,height=724,quality=85,format=auto,fit=pad,background=white/SOURCE/c6f1ff7de4bd45168654bba14f9f2a3c',
                'image_thumb' => 'https://static.galerieslafayette.com/cdn-cgi/image/width=664,height=724,quality=85,format=auto,fit=pad,background=white/SOURCE/c6f1ff7de4bd45168654bba14f9f2a3c',
                'images' => json_encode([
                    'https://static.galerieslafayette.com/cdn-cgi/image/width=664,height=724,quality=85,format=auto,fit=pad,background=white/SOURCE/c6f1ff7de4bd45168654bba14f9f2a3c'
                ]),
                'details_techniques' => '100% Laine vierge · Doublure soie · Fabriqué en France',
                'stock' => 20,
                'en_vedette' => false,
                'actif' => true
            ],
            [
                'nom' => 'Robe Midi Plissée',
                'slug' => 'robe-midi-plissee',
                'categorie_id' => 2,
                'marque_id' => 1,
                'description' => 'Robe midi en crêpe plissé, ceinture à nouer et manches longues.',
                'prix' => 1450.00,
                'image_main' => 'https://cdn-images.farfetch-contents.com/27/37/15/17/27371517_58033030_1000.jpg',
                'image_thumb' => 'https://cdn-images.farfetch-contents.com/27/37/15/17/27371517_58033030_1000.jpg',
                'images' => json_encode([
                    'https://cdn-images.farfetch-contents.com/27/37/15/17/27371517_58033030_1000.jpg'
                ]),
                'details_techniques' => 'Crêpe de soie · Plissage permanent · Longueur: 120cm',
                'stock' => 10,
                'en_vedette' => false,
                'actif' => true
            ],
            [
                'nom' => 'Collier Chaîne Or',
                'slug' => 'collier-chaine-or',
                'categorie_id' => 4,
                'marque_id' => 3,
                'description' => 'Collier chaîne en or 18 carats, maillons larges et fermoir mousqueton.',
                'prix' => 3500.00,
                'image_main' => 'https://cdn-images.farfetch-contents.com/22/02/94/93/22029493_52129921_1000.jpg',
                'image_thumb' => 'https://cdn-images.farfetch-contents.com/22/02/94/93/22029493_52129921_1000.jpg',
                'images' => json_encode([
                    'https://cdn-images.farfetch-contents.com/22/02/94/93/22029493_52129921_1000.jpg'
                ]),
                'details_techniques' => 'Or 18K · Poids: 25g · Longueur: 45cm',
                'stock' => 5,
                'en_vedette' => true,
                'actif' => true
            ],
            [
                'nom' => 'Sac Bandoulière Cuir',
                'slug' => 'sac-bandouliere-cuir',
                'categorie_id' => 3,
                'marque_id' => 2,
                'description' => 'Petit sac bandoulière en cuir lisse, chaîne dorée et rabat magnétique.',
                'prix' => 1890.00,
                'image_main' => 'https://cdn-images.farfetch-contents.com/18/74/20/56/18742056_40562062_1000.jpg',
                'image_thumb' => 'https://cdn-images.farfetch-contents.com/18/74/20/56/18742056_40562062_1000.jpg',
                'images' => json_encode([
                    'https://cdn-images.farfetch-contents.com/18/74/20/56/18742056_40562062_1000.jpg'
                ]),
                'details_techniques' => 'Cuir d\'agneau · Chaîne plaqué or · Dimensions: 20x15x8cm',
                'stock' => 18,
                'en_vedette' => false,
                'actif' => true
            ],
            [
                'nom' => 'Lunettes Soleil Oversize',
                'slug' => 'lunettes-soleil-oversize',
                'categorie_id' => 4,
                'marque_id' => 4,
                'description' => 'Lunettes de soleil oversize, monture acétate et verres polarisés.',
                'prix' => 450.00,
                'image_main' => 'https://static.galerieslafayette.com/cdn-cgi/image/width=1466,height=824,quality=85,format=auto,fit=cover/https://sapapi.galerieslafayette.com/medias/sys_master/images/ha4/h20/9183805866014/rectangle_femme/rectangle-femme.jpg',
                'image_thumb' => 'https://static.galerieslafayette.com/cdn-cgi/image/width=1466,height=824,quality=85,format=auto,fit=cover/https://sapapi.galerieslafayette.com/medias/sys_master/images/ha4/h20/9183805866014/rectangle_femme/rectangle-femme.jpg',
                'images' => json_encode([
                    'https://static.galerieslafayette.com/cdn-cgi/image/width=1466,height=824,quality=85,format=auto,fit=cover/https://sapapi.galerieslafayette.com/medias/sys_master/images/ha4/h20/9183805866014/rectangle_femme/rectangle-femme.jpg'
                ]),
                'details_techniques' => 'Acétate italien · Verres UV400 · Étui inclus',
                'stock' => 25,
                'en_vedette' => false,
                'actif' => true
            ]

        ];

        foreach ($produits as $produit) {
            Produit::create($produit);
        }

        // Éditoriaux
        $editorials = [
            [
                'titre' => 'L\'Art de la Silhouette',
                'slug' => 'art-de-la-silhouette',
                'contenu' => 'Explorez l\'art de la silhouette à travers les âges...',
                'image' => 'https://images.unsplash.com/photo-1539109136881-3be0616acf4b?w=1200&auto=format&fit=crop&q=60',
                'categorie' => 'Style',
                'auteur' => 'Marie Laurent',
                'temps_lecture' => 8,
                'date_publication' => now()->subDays(10),
                'publie' => true
            ],
            [
                'titre' => 'Matières Rares',
                'slug' => 'matieres-rares',
                'contenu' => 'Découvrez les matières les plus rares de notre planète...',
                'image' => 'https://images.unsplash.com/photo-1523381210434-271e8be1f52b?w=1200&auto=format&fit=crop&q=60',
                'categorie' => 'Matières',
                'auteur' => 'Sophie Dubois',
                'temps_lecture' => 6,
                'date_publication' => now()->subDays(5),
                'publie' => true
            ],
            [
                'titre' => 'Ateliers Secrets',
                'slug' => 'ateliers-secrets',
                'contenu' => 'Pénétrez dans les ateliers secrets où la magie opère...',
                'image' => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=1200&auto=format&fit=crop&q=60',
                'categorie' => 'Savoir-faire',
                'auteur' => 'Jean-Pierre Martin',
                'temps_lecture' => 10,
                'date_publication' => now()->subDays(2),
                'publie' => true
            ]
        ];

        foreach ($editorials as $editorial) {
            Editorial::create($editorial);
        }
    }
}