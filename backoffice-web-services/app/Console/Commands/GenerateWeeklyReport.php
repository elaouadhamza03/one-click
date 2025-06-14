<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\WeeklyReport;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\Quote;
use Illuminate\Support\Facades\Storage;

/**
 * Commande améliorée pour générer le rapport hebdomadaire
 */
class GenerateWeeklyReport extends Command
{
    protected $signature = 'report:weekly {--test : Mode test pour développement}';
    protected $description = 'Génère et envoie le rapport hebdomadaire des devis avec design professionnel';

    public function handle(): int
    {
        $this->info('🚀 Génération du rapport hebdomadaire...');
        
        // Définir les dates de la période
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subWeek();
        
        if ($this->option('test')) {
            $this->warn('⚠️  Mode TEST activé - Période étendue pour avoir des données');
            $startDate = Carbon::now()->subMonth(); // 1 mois pour les tests
        }

        // Récupérer les données des devis
        $quotes = Quote::whereBetween('created_at', [$startDate, $endDate])->get();
        
        $this->info("📊 Période analysée : {$startDate->format('d/m/Y')} au {$endDate->format('d/m/Y')}");
        $this->info("📋 Nombre de devis trouvés : {$quotes->count()}");
        
        // Préparer les données du rapport
        $reportData = [
            'start_date' => $startDate->format('d/m/Y'),
            'end_date' => $endDate->format('d/m/Y'),
            'total_devis' => $quotes->count(),
            'validated_devis' => $quotes->where('status', 'valide')->count(),
            'rejected_devis' => $quotes->where('status', 'refuse')->count(),
            'pending_devis' => $quotes->where('status', 'en_attente')->count(),
            'quotes' => $quotes,
            'generated_at' => now(),
            'report_version' => 'v2.1'
        ];
        
        $this->info('📈 Génération des statistiques...');
        $this->table(
            ['Statut', 'Nombre', 'Pourcentage'],
            [
                ['Total', $reportData['total_devis'], '100%'],
                ['Validés', $reportData['validated_devis'], 
                 $reportData['total_devis'] > 0 ? round(($reportData['validated_devis'] / $reportData['total_devis']) * 100, 1) . '%' : '0%'],
                ['Refusés', $reportData['rejected_devis'], 
                 $reportData['total_devis'] > 0 ? round(($reportData['rejected_devis'] / $reportData['total_devis']) * 100, 1) . '%' : '0%'],
                ['En attente', $reportData['pending_devis'], 
                 $reportData['total_devis'] > 0 ? round(($reportData['pending_devis'] / $reportData['total_devis']) * 100, 1) . '%' : '0%']
            ]
        );

        // Créer le dossier reports s'il n'existe pas
        if (!Storage::exists('reports')) {
            Storage::makeDirectory('reports');
            $this->info('📁 Dossier reports créé');
        }

        // Générer le PDF avec le nouveau template
        $this->info('📄 Génération du PDF...');
        try {
            $pdf = Pdf::loadView('reports.weekly-professional', $reportData);
            $pdf->setPaper('A4', 'portrait');
            
            $fileName = 'weekly-report-' . $endDate->format('Y-m-d') . '.pdf';
            $pdfPath = storage_path('app/reports/' . $fileName);
            
            $pdf->save($pdfPath);
            $this->info("✅ PDF généré : {$fileName}");
            
        } catch (\Exception $e) {
            $this->error("❌ Erreur lors de la génération du PDF : " . $e->getMessage());
            return Command::FAILURE;
        }

        // Envoyer l'email
        if ($this->option('test')) {
            $this->warn('⚠️  Mode test : Email non envoyé');
            $this->info("📧 L'email aurait été envoyé à : " . config('mail.admin_email'));
        } else {
            $this->info('📧 Envoi de l\'email...');
            try {
                Mail::to(config('mail.admin_email'))->send(new WeeklyReport($reportData, $pdfPath));
                $this->info('✅ Email envoyé avec succès à : ' . config('mail.admin_email'));
            } catch (\Exception $e) {
                $this->error("❌ Erreur lors de l'envoi de l'email : " . $e->getMessage());
                return Command::FAILURE;
            }
        }

        // Nettoyage des anciens rapports (garder les 10 derniers)
        $this->info('🧹 Nettoyage des anciens rapports...');
        $reportFiles = Storage::files('reports');
        if (count($reportFiles) > 10) {
            $filesToDelete = array_slice($reportFiles, 0, count($reportFiles) - 10);
            foreach ($filesToDelete as $file) {
                Storage::delete($file);
            }
            $this->info('✅ ' . count($filesToDelete) . ' anciens rapports supprimés');
        }

        $this->info('🎉 Rapport hebdomadaire généré et envoyé avec succès !');
        
        if ($this->option('test')) {
            $this->warn('💡 Pour envoyer réellement l\'email, retirez l\'option --test');
        }
        
        return Command::SUCCESS;
    }
}