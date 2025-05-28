<?php

// Dans Service.php
namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titre',
        'description',
        'logo',
        'image',
        'nom_de_page_html'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Mutateur pour le logo
    public function setLogoAttribute($value)
    {
        $this->uploadFileToDisk($value, 'logo', 'public', 'services');
    }

    // Mutateur pour l'image
    public function setImageAttribute($value)
    {
        $this->uploadFileToDisk($value, 'image', 'public', 'services');
    }

    // Accesseur pour l'URL du logo
    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            return asset('storage/services/' . $this->logo);
        }
        return null;
    }

    // Accesseur pour l'URL de l'image
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/services/' . $this->image);
        }
        return null;
    }
}

// Même chose pour Project.php et Setting.php avec les bons dossiers
// Project : 'projects'
// Setting : 'settings'