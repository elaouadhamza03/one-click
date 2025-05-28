<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quote;
use App\Models\Service;
use App\Models\Project;
use App\Models\Setting;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "🚀 Création des données de test...\n";

        // Créer quelques devis de test
        Quote::create([
            'nom' => 'Jean Dupont',
            'email' => 'jean.dupont@email.com',
            'message' => 'Bonjour, je souhaiterais un devis pour la création d\'un site e-commerce avec système de paiement intégré.',
            'status' => 'en_attente'
        ]);

        Quote::create([
            'nom' => 'Marie Martin',
            'email' => 'marie.martin@email.com',
            'message' => 'Je recherche un développeur pour refondre complètement mon site vitrine. Le site actuel est obsolète.',
            'status' => 'valide'
        ]);

        Quote::create([
            'nom' => 'Pierre Bernard',
            'email' => 'pierre.bernard@email.com',
            'message' => 'Besoin d\'une application mobile pour mon restaurant avec système de commande en ligne.',
            'status' => 'en_attente'
        ]);

        Quote::create([
            'nom' => 'Sophie Dubois',
            'email' => 'sophie.dubois@email.com',
            'message' => 'Création d\'un site portfolio pour mon activité de photographe.',
            'status' => 'refuse'
        ]);

        Quote::create([
            'nom' => 'Lucas Moreau',
            'email' => 'lucas.moreau@email.com',
            'message' => 'Site web pour mon cabinet de conseil avec espace client privé.',
            'status' => 'valide'
        ]);

        echo "✅ 5 devis créés\n";

        // Créer quelques services
        Service::create([
            'titre' => 'Création de sites web',
            'description' => 'Développement de sites web modernes et responsives avec les dernières technologies. Design sur mesure et optimisation SEO incluse.',
            'nom_de_page_html' => 'creation-sites-web'
        ]);

        Service::create([
            'titre' => 'E-commerce',
            'description' => 'Solutions e-commerce complètes avec paiement en ligne, gestion des stocks et tableau de bord administrateur.',
            'nom_de_page_html' => 'e-commerce'
        ]);

        Service::create([
            'titre' => 'Applications mobiles',
            'description' => 'Développement d\'applications mobiles natives et hybrides pour iOS et Android.',
            'nom_de_page_html' => 'applications-mobiles'
        ]);

        Service::create([
            'titre' => 'Maintenance et support',
            'description' => 'Services de maintenance, mise à jour et support technique pour vos sites et applications.',
            'nom_de_page_html' => 'maintenance-support'
        ]);

        echo "✅ 4 services créés\n";

        // Créer quelques réalisations
        Project::create([
            'titre' => 'Site Restaurant Le Gourmet',
            'description' => 'Site vitrine avec système de réservation en ligne, menu interactif et galerie photos. Design élégant et moderne.',
            'lien' => 'https://exemple-restaurant.com',
            'lien_page_html' => 'https://exemple-restaurant.com/presentation'
        ]);

        Project::create([
            'titre' => 'E-commerce Mode Tendance',
            'description' => 'Boutique en ligne complète avec catalogue produits, panier, paiement sécurisé et espace client.',
            'lien' => 'https://exemple-mode.com',
            'lien_page_html' => 'https://exemple-mode.com/about'
        ]);

        Project::create([
            'titre' => 'App Mobile Fitness',
            'description' => 'Application mobile de coaching sportif avec suivi des performances et programmes personnalisés.',
            'lien' => 'https://play.google.com/store/apps/fitness-app',
            'lien_page_html' => 'https://fitness-app.com'
        ]);

        Project::create([
            'titre' => 'Portfolio Architecte',
            'description' => 'Site portfolio moderne pour cabinet d\'architecture avec galerie projets et formulaire de contact.',
            'lien' => 'https://exemple-architecte.com',
            'lien_page_html' => 'https://exemple-architecte.com/portfolio'
        ]);

        Project::create([
            'titre' => 'Plateforme de Formation',
            'description' => 'Plateforme e-learning avec cours en ligne, quiz interactifs et suivi de progression.',
            'lien' => 'https://exemple-formation.com',
            'lien_page_html' => 'https://exemple-formation.com/demo'
        ]);

        echo "✅ 5 réalisations créées\n";

        // Créer les paramètres de base
        Setting::create([
            'email_contact' => 'contact@services-web.com',
            'adresse' => '123 Rue de l\'Innovation, 75001 Paris, France',
            'telephone' => '01 23 45 67 89',
            'localisation' => 'Paris, France',
            'description' => 'Agence spécialisée dans la création de sites web, applications mobiles et solutions e-commerce. Nous accompagnons nos clients dans leur transformation digitale avec des solutions sur mesure et innovantes.'
        ]);

        echo "✅ Paramètres du site créés\n";
        echo "🎉 Données de test créées avec succès !\n";
    }
}