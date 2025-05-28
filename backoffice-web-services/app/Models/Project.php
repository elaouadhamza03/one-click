<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titre',
        'description',
        'logo',
        'image',
        'lien_page_html',
        'lien'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Mutateurs pour gérer l'upload des fichiers avec Backpack
    public function setLogoAttribute($value)
    {
        $attribute_name = "logo";
        $disk = "public";
        $destination_path = "projects";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "projects";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    // Accesseurs CORRIGÉS pour les URLs
    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            // Le champ $this->logo contient déjà "projects/filename.jpg"
            // Donc on utilise asset('storage/' + $this->logo) au lieu de asset('storage/projects/' + $this->logo)
            return asset('storage/' . $this->logo);
        }
        return null;
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Même correction ici
            return asset('storage/' . $this->image);
        }
        return null;
    }
}