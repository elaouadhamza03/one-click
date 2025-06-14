<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $table = 'quotes';

    protected $fillable = [
        'client_name',
        'client_email',
        'service_type',
        'description',
        'status',
        'amount',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
} 