<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quote;
use App\Models\Service;
use App\Models\Project;
use App\Models\Setting;
use Carbon\Carbon;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "🚀 Ajout des données de test...\n";

        // Créer des devis avec différentes dates (3 derniers mois)
        $this->createQuotesWithDifferentDates();

        echo "✅ " . Quote::count() . " devis au total\n";

        // Créer quelques services (seulement s'ils n'existent pas)
        $this->createServicesIfNotExists();

        echo "✅ " . Service::count() . " services au total\n";

        // Créer quelques réalisations
        $this->createProjectsIfNotExists();

        echo "✅ " . Project::count() . " réalisations au total\n";

        // Créer les paramètres de base (seulement si pas de settings)
        $this->createSettingsIfNotExists();

        echo "✅ Paramètres vérifiés\n";
        echo "🎉 Données de test ajoutées avec succès !\n";
    }

    private function createQuotesWithDifferentDates()
    {
        $quotes = [
            // Mois actuel (Mai 2025)
            [
                'nom' => 'Jean Dupont',
                'email' => 'jean.dupont@email.com',
                'message' => 'Bonjour, je souhaiterais un devis pour la création d\'un site e-commerce avec système de paiement intégré.',
                'status' => 'en_attente',
                'created_at' => Carbon::now()->subDays(2)
            ],
            [
                'nom' => 'Marie Martin',
                'email' => 'marie.martin@email.com',
                'message' => 'Je recherche un développeur pour refondre complètement mon site vitrine. Le site actuel est obsolète.',
                'status' => 'valide',
                'created_at' => Carbon::now()->subDays(5)
            ],
            [
                'nom' => 'Pierre Bernard',
                'email' => 'pierre.bernard@email.com',
                'message' => 'Besoin d\'une application mobile pour mon restaurant avec système de commande en ligne.',
                'status' => 'en_attente',
                'created_at' => Carbon::now()->subDays(10)
            ],
            [
                'nom' => 'Sophie Dubois',
                'email' => 'sophie.dubois@email.com',
                'message' => 'Création d\'un site portfolio pour mon activité de photographe.',
                'status' => 'refuse',
                'created_at' => Carbon::now()->subDays(15)
            ],
            [
                'nom' => 'Lucas Moreau',
                'email' => 'lucas.moreau@email.com',
                'message' => 'Site web pour mon cabinet de conseil avec espace client privé.',
                'status' => 'valide',
                'created_at' => Carbon::now()->subDays(20)
            ],

            // Mois précédent (Avril 2025)
            [
                'nom' => 'Emma Laurent',
                'email' => 'emma.laurent@email.com',
                'message' => 'Je souhaite créer un site pour mon salon de coiffure avec prise de rendez-vous en ligne.',
                'status' => 'valide',
                'created_at' => Carbon::now()->subMonth()->subDays(3)
            ],
            [
                'nom' => 'Thomas Petit',
                'email' => 'thomas.petit@email.com',
                'message' => 'Refonte complète de notre site corporate avec espace presse et carrières.',
                'status' => 'valide',
                'created_at' => Carbon::now()->subMonth()->subDays(8)
            ],
            [
                'nom' => 'Camille Durand',
                'email' => 'camille.durand@email.com',
                'message' => 'Application de gestion pour mon auto-école avec planning et suivi élèves.',
                'status' => 'en_attente',
                'created_at' => Carbon::now()->subMonth()->subDays(12)
            ],
            [
                'nom' => 'Nicolas Leroy',
                'email' => 'nicolas.leroy@email.com',
                'message' => 'Site e-commerce pour vente de matériel de sport en ligne.',
                'status' => 'refuse',
                'created_at' => Carbon::now()->subMonth()->subDays(18)
            ],
            [
                'nom' => 'Julie Garcia',
                'email' => 'julie.garcia@email.com',
                'message' => 'Plateforme de formation en ligne avec vidéos et quiz interactifs.',
                'status' => 'valide',
                'created_at' => Carbon::now()->subMonth()->subDays(25)
            ],

            // Il y a 2 mois (Mars 2025)
            [
                'nom' => 'Antoine Roux',
                'email' => 'antoine.roux@email.com',
                'message' => 'Site vitrine pour mon cabinet d\'architecture avec galerie de réalisations.',
                'status' => 'valide',
                'created_at' => Carbon::now()->subMonths(2)->subDays(5)
            ],
            [
                'nom' => 'Léa Bonnet',
                'email' => 'lea.bonnet@email.com',
                'message' => 'Application mobile de livraison de repas pour ma ville.',
                'status' => 'refuse',
                'created_at' => Carbon::now()->subMonths(2)->subDays(10)
            ],
            [
                'nom' => 'Maxime Faure',
                'email' => 'maxime.faure@email.com',
                'message' => 'Site web pour mon agence immobilière avec recherche avancée.',
                'status' => 'valide',
                'created_at' => Carbon::now()->subMonths(2)->subDays(15)
            ],
            [
                'nom' => 'Clara Morel',
                'email' => 'clara.morel@email.com',
                'message' => 'Boutique en ligne pour produits artisanaux fait-main.',
                'status' => 'en_attente',
                'created_at' => Carbon::now()->subMonths(2)->subDays(20)
            ],
            [
                'nom' => 'Hugo Simon',
                'email' => 'hugo.simon@email.com',
                'message' => 'Site de réservation en ligne pour chambres d\'hôtes.',
                'status' => 'valide',
                'created_at' => Carbon::now()->subMonths(2)->subDays(28)
            ],

            // Il y a 3 mois (Février 2025)
            [
                'nom' => 'Sarah Michel',
                'email' => 'sarah.michel@email.com',
                'message' => 'Application de gestion de stock pour mon magasin.',
                'status' => 'valide',
                'created_at' => Carbon::now()->subMonths(3)->subDays(10)
            ],
            [
                'nom' => 'Julien Blanc',
                'email' => 'julien.blanc@email.com',
                'message' => 'Site portfolio pour artiste peintre avec vente en ligne.',
                'status' => 'refuse',
                'created_at' => Carbon::now()->subMonths(3)->subDays(20)
            ]
        ];

        foreach ($quotes as $quoteData) {
            // Vérifier si le devis n'existe pas déjà (par email)
            if (!Quote::where('email', $quoteData['email'])->exists()) {
                Quote::create($quoteData);
            }
        }
    }

    private function createServicesIfNotExists()
    {
        $services = [
            [
                'titre' => 'Création de sites web',
                'description' => 'Développement de sites web modernes et responsives avec les dernières technologies. Design sur mesure et optimisation SEO incluse.',
                'nom_de_page_html' => 'creation-sites-web'
            ],
            [
                'titre' => 'E-commerce',
                'description' => 'Solutions e-commerce complètes avec paiement en ligne, gestion des stocks et tableau de bord administrateur.',
                'nom_de_page_html' => 'e-commerce'
            ],
            [
                'titre' => 'Applications mobiles',
                'description' => 'Développement d\'applications mobiles natives et hybrides pour iOS et Android.',
                'nom_de_page_html' => 'applications-mobiles'
            ],
            [
                'titre' => 'Maintenance et support',
                'description' => 'Services de maintenance, mise à jour et support technique pour vos sites et applications.',
                'nom_de_page_html' => 'maintenance-support'
            ]
        ];

        foreach ($services as $serviceData) {
            // Créer seulement si le service n'existe pas
            if (!Service::where('nom_de_page_html', $serviceData['nom_de_page_html'])->exists()) {
                Service::create($serviceData);
            }
        }
    }

    private function createProjectsIfNotExists()
    {
        $projects = [
            [
                'titre' => 'Site Restaurant Le Gourmet',
                'description' => 'Site vitrine avec système de réservation en ligne, menu interactif et galerie photos. Design élégant et moderne.',
                'lien' => 'https://exemple-restaurant.com',
                'lien_page_html' => 'restaurant-le-gourmet'
            ],
            [
                'titre' => 'E-commerce Mode Tendance',
                'description' => 'Boutique en ligne complète avec catalogue produits, panier, paiement sécurisé et espace client.',
                'lien' => 'https://exemple-mode.com',
                'lien_page_html' => 'ecommerce-mode-tendance'
            ],
            [
                'titre' => 'App Mobile Fitness',
                'description' => 'Application mobile de coaching sportif avec suivi des performances et programmes personnalisés.',
                'lien' => 'https://play.google.com/store/apps/fitness-app',
                'lien_page_html' => 'app-mobile-fitness'
            ],
            [
                'titre' => 'Portfolio Architecte',
                'description' => 'Site portfolio moderne pour cabinet d\'architecture avec galerie projets et formulaire de contact.',
                'lien' => 'https://exemple-architecte.com',
                'lien_page_html' => 'portfolio-architecte'
            ],
            [
                'titre' => 'Plateforme de Formation',
                'description' => 'Plateforme e-learning avec cours en ligne, quiz interactifs et suivi de progression.',
                'lien' => 'https://exemple-formation.com',
                'lien_page_html' => 'plateforme-formation'
            ]
        ];

        foreach ($projects as $projectData) {
            // Créer seulement si le projet n'existe pas
            if (!Project::where('lien_page_html', $projectData['lien_page_html'])->exists()) {
                Project::create($projectData);
            }
        }
    }

    private function createSettingsIfNotExists()
    {
        // Créer seulement s'il n'y a pas de settings
        if (Setting::count() === 0) {
            Setting::create([
                'email_contact' => 'contact@services-web.com',
                'adresse' => '123 Rue de l\'Innovation, 75001 Paris, France',
                'telephone' => '01 23 45 67 89',
                'localisation' => 'Paris, France',
                'description' => 'Agence spécialisée dans la création de sites web, applications mobiles et solutions e-commerce. Nous accompagnons nos clients dans leur transformation digitale avec des solutions sur mesure et innovantes.'
            ]);
        }
    }
}