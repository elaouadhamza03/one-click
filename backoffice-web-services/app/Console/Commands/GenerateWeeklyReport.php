<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\WeeklyReport;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\Quote;
use App\Mail\NewDevisRequest;
use App\Mail\DevisStatusUpdate;

class GenerateWeeklyReport extends Command
{
    protected $signature = 'report:weekly';
    protected $description = 'Génère et envoie le rapport hebdomadaire des devis';

    public function handle(): void
    {
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subWeek();

        // Récupérer les données des devis
        $quotes = Quote::whereBetween('created_at', [$startDate, $endDate])->get();
        $reportData = [
            'start_date' => $startDate->format('d/m/Y'),
            'end_date' => $endDate->format('d/m/Y'),
            'total_devis' => $quotes->count(),
            'validated_devis' => $quotes->where('status', 'valide')->count(),
            'rejected_devis' => $quotes->where('status', 'refuse')->count(),
            'quotes' => $quotes,
        ];

        // Générer le PDF
        $pdf = Pdf::loadView('reports.weekly', $reportData);
        $pdfPath = storage_path('app/reports/weekly-report-' . $endDate->format('Y-m-d') . '.pdf');
        $pdf->save($pdfPath);

        // Envoyer l'email
        Mail::to(config('mail.admin_email'))->send(new WeeklyReport($reportData, $pdfPath));

        $this->info('Rapport hebdomadaire généré et envoyé avec succès.');
    }
} 