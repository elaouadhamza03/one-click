<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Quote;

/**
 * Mail pour nouvelle demande de devis avec design professionnel
 */
class NewDevisRequest extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Quote $quote
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🚨 Nouvelle demande de devis reçue - Action requise',
            from: config('mail.from.address'),
            replyTo: config('mail.from.address')
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-devis-request-professional',
            with: [
                'clientName' => $this->quote->nom,
                'clientEmail' => $this->quote->email,
                'message' => $this->quote->message,
                'quoteId' => $this->quote->id,
                'receivedAt' => $this->quote->created_at,
                'backofficeUrl' => backpack_url('quote/' . $this->quote->id . '/show'),
                'dashboardUrl' => backpack_url('dashboard')
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
