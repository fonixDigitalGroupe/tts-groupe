<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicePagesSeeder extends Seeder
{
    /**
     * Réinjecte le contenu original des anciennes pages dans les pages
     * de service éditables (repérage par slug), en cartes structurées. Idempotent.
     */
    public function run(): void
    {
        $pages = [
            'bureau-detudes' => [
                'subtitle' => "Le Bureau d'Études de TTS GROUPE est le moteur de notre développement, alliant excellence technique et vision globale.",
                'cards' => [
                    ['title' => 'SIG & cartographie', 'items' => [
                        'Modélisation territoriale avancée',
                        'Cartographie de précision multi-secteurs',
                        'Gestion des ressources & Urbanisme',
                        'Intégration de données multi-sources',
                    ]],
                    ['title' => 'Développement logiciel', 'items' => [
                        'Applications métier sur mesure',
                        'Plateformes de supervision temps réel',
                        'Optimisation des processus opérationnels',
                        'Tableaux de bord & Reporting IA',
                    ]],
                    ['title' => 'Détection & numérisation', 'items' => [
                        'Détection de réseaux enterrés',
                        'Géoréférencement GPS centimétrique',
                        'Mise à jour patrimoniale (DOE)',
                        "Numérisation 3D d'infrastructures",
                    ]],
                    ['title' => 'Audit & diagnostic', 'items' => [
                        "Audit technique d'infrastructures",
                        'Diagnostic de performance & Qualité',
                        'Études de mise en conformité',
                        'Préconisations technico-économiques',
                    ]],
                ],
            ],
            'raccordement-ftth' => [
                'subtitle' => "Expertise en distribution finale et raccordements multi-opérateurs pour une connectivité sans faille.",
                'cards' => [
                    ['title' => 'Raccordement abonné', 'items' => [
                        "Raccordement du boîtier jusqu'au logement",
                        'Tirage de câble fibre optique',
                        'Soudure et mesures optiques',
                        'Mise en service et tests finaux',
                    ]],
                    ['title' => 'Engagement qualité', 'items' => [
                        'Matériel de soudure haute précision Sumitomo',
                        'Réflectométrie et rapports détaillés',
                        'Techniciens certifiés experts opérateurs',
                        'Respect scrupuleux des consignes de sécurité',
                    ]],
                ],
            ],
            'sav-diagnostic' => [
                'subtitle' => "Réactivité, précision et expertise dans la recherche de pannes pour une maintenance optimale.",
                'cards' => [
                    ['title' => 'Maintenance réseau', 'items' => [
                        'Maintenance préventive et corrective experte',
                        'Sécurisation et pérennisation du réseau',
                        'Travaux sur poteaux et ouvrages techniques',
                    ]],
                    ['title' => 'Audit & diagnostic', 'items' => [
                        'Interventions sur la distribution finale',
                        'Reprises de soudures et de câblage expert',
                        'Remise en conformité des installations',
                    ]],
                ],
            ],
            'deploiement' => [
                'subtitle' => "Solutions réseaux robustes et évolutives pour répondre aux besoins croissants de connectivité globale.",
                'cards' => [
                    ['title' => 'Extensions réseau', 'items' => [
                        'Création de nouvelles artères de distribution expertes',
                        'Extensions aériennes et souterraines complexes',
                        "Aménagement d'infrastructures de nouvelle génération",
                    ]],
                    ['title' => 'Infrastructure FTTH', 'items' => [
                        'Déploiement complet de réseau FTTH structurant',
                        'Pose et raccordement des boîtiers de distribution',
                        'Pré-recettes et contrôles qualité rigoureux',
                    ]],
                ],
            ],
        ];

        foreach ($pages as $slug => $data) {
            $service = Service::where('slug', $slug)->first();
            if ($service) {
                $service->update([
                    'page_subtitle' => $data['subtitle'],
                    'cards'         => $data['cards'],
                ]);
            }
        }
    }
}
