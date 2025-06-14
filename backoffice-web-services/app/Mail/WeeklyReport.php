<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

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
            subject: 'Rapport hebdomadaire des devis'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.weekly-report',
            with: [
                'reportData' => $this->reportData,
                'startDate' => $this->reportData['start_date'],
                'endDate' => $this->reportData['end_date'],
                'totalDevis' => $this->reportData['total_devis'],
                'validatedDevis' => $this->reportData['validated_devis'],
                'rejectedDevis' => $this->reportData['rejected_devis']
            ]
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->pdfPath)
                ->as('rapport-hebdomadaire.pdf')
                ->withMime('application/pdf'),
        ];
    }
} 