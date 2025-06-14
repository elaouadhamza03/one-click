<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DevisStatusUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public $devis
    ) {}

    public function envelope(): Envelope
    {
        $status = $this->devis->status === 'valide' ? 'validé' : 'refusé';
        return new Envelope(
            subject: "Mise à jour de votre demande de devis - {$status}"
        );
    }

    public function content(): Content
    {
        $status = $this->devis->status === 'valide' ? 'validé' : 'refusé';
        
        return new Content(
            view: 'emails.devis-status-update',
            with: [
                'status' => $status,
                'clientName' => $this->devis->nom,
                'clientEmail' => $this->devis->email,
                'message' => $this->devis->message,
                'devisId' => $this->devis->id
            ]
        );
    }
} 