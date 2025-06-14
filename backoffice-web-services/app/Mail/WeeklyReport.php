<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

/**
 * Mail pour rapport hebdomadaire avec design professionnel et PDF en pièce jointe
 */
class WeeklyReport extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public $reportData,
        public $pdfPath
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '📊 Rapport hebdomadaire des devis - Semaine du ' . $this->reportData['start_date'],
            from: config('mail.from.address')
        );
    }

    public function content(): Content
    {
        // Calculs pour les KPIs
        $totalDevis = $this->reportData['total_devis'];
        $validatedDevis = $this->reportData['validated_devis'];
        $rejectedDevis = $this->reportData['rejected_devis'];
        $pendingDevis = $totalDevis - $validatedDevis - $rejectedDevis;
        $validationRate = $totalDevis > 0 ? round(($validatedDevis / $totalDevis) * 100, 1) : 0;
        
        return new Content(
            view: 'emails.weekly-report-professional',
            with: [
                'reportData' => $this->reportData,
                'startDate' => $this->reportData['start_date'],
                'endDate' => $this->reportData['end_date'],
                'totalDevis' => $totalDevis,
                'validatedDevis' => $validatedDevis,
                'rejectedDevis' => $rejectedDevis,
                'pendingDevis' => $pendingDevis,
                'validationRate' => $validationRate,
                'dailyAverage' => round($totalDevis / 7, 1),
                'generatedAt' => now(),
                'reportVersion' => 'v2.1',
                'weeklyTarget' => 10,
                'dashboardUrl' => backpack_url('dashboard'),
                'quotesUrl' => backpack_url('quote')
            ]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->pdfPath)
                ->as('rapport-hebdomadaire-' . $this->reportData['start_date'] . '-' . $this->reportData['end_date'] . '.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
