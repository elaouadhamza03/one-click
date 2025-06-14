<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Mail\DevisStatusUpdate;
use App\Mail\NewDevisRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class Quote extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'quotes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nom',
        'email', 
        'message',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accesseur pour afficher le statut en français
    public function getStatusLabelAttribute()
    {
        $statuses = [
            'en_attente' => 'En attente',
            'valide' => 'Validé',
            'refuse' => 'Refusé'
        ];
        
        return $statuses[$this->status] ?? $this->status;
    }

    protected static function booted()
    {
        // Envoyer un email lorsqu'un nouveau devis est créé
        static::created(function ($quote) {
            try {
                Log::info('Tentative d\'envoi d\'email pour le nouveau devis #' . $quote->id);
                Log::info('Email destinataire: ' . config('mail.admin_email'));
                
                Mail::to(config('mail.admin_email'))->send(new NewDevisRequest($quote));
                
                Log::info('Email de nouveau devis envoyé avec succès pour le devis #' . $quote->id);
            } catch (\Exception $e) {
                Log::error('Erreur lors de l\'envoi de l\'email de nouveau devis: ' . $e->getMessage());
                Log::error('Trace: ' . $e->getTraceAsString());
            }
        });

        // Envoyer un email lorsque le statut est modifié
        static::updated(function ($quote) {
            if ($quote->isDirty('status') && in_array($quote->status, ['valide', 'refuse'])) {
                try {
                    Log::info('Tentative d\'envoi d\'email pour le devis #' . $quote->id);
                    Log::info('Email destinataire: ' . $quote->email);
                    Log::info('Nouveau statut: ' . $quote->status);
                    
                    Mail::to($quote->email)->send(new DevisStatusUpdate($quote));
                    
                    Log::info('Email envoyé avec succès pour le devis #' . $quote->id);
                } catch (\Exception $e) {
                    Log::error('Erreur lors de l\'envoi de l\'email de mise à jour du devis: ' . $e->getMessage());
                    Log::error('Trace: ' . $e->getTraceAsString());
                }
            }
        });
    }
}