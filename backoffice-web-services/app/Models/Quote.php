<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}