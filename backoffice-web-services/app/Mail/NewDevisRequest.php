<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Quote;

class NewDevisRequest extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Quote $quote
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvelle demande de devis'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-devis-request',
            with: [
                'clientName' => $this->quote->nom,
                'clientEmail' => $this->quote->email,
                'message' => $this->quote->message,
                'quoteId' => $this->quote->id
            ]
        );
    }
} 