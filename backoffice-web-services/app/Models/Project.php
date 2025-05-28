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

    // Accesseur pour l'URL du logo
    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            return asset('storage/projects/' . $this->logo);
        }
        return null;
    }

    // Accesseur pour l'URL de l'image
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/projects/' . $this->image);
        }
        return null;
    }
}