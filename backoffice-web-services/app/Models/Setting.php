<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email_contact',
        'adresse',
        'telephone',
        'localisation',
        'description',
        'logo_blanc',
        'logo_noir'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}