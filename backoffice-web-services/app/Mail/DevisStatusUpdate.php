<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Mail pour mise à jour du statut d'un devis avec design professionnel
 */
class DevisStatusUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public $devis
    ) {}

    public function envelope(): Envelope
    {
        $status = $this->devis->status === 'valide' ? 'validé' : 'refusé';
        $emoji = $this->devis->status === 'valide' ? '✅' : '❌';
        
        return new Envelope(
            subject: "{$emoji} Mise à jour de votre demande de devis - {$status}",
            from: config('mail.from.address'),
            replyTo: $this->devis->status === 'valide' ? config('mail.from.address') : null
        );
    }

    public function content(): Content
    {
        $status = $this->devis->status === 'valide' ? 'validé' : 'refusé';
        
        return new Content(
            view: 'emails.devis-status-update-professional',
            with: [
                'status' => $status,
                'clientName' => $this->devis->nom,
                'clientEmail' => $this->devis->email,
                'message' => $this->devis->message,
                'devisId' => $this->devis->id,
                'updatedAt' => now(),
                'isValidated' => $this->devis->status === 'valide',
                'contactPhone' => '01 23 45 67 89',
                'websiteUrl' => 'https://www.oneclick-services.com'
            ]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}