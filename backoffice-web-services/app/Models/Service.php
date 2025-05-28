<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // Mutateurs pour gérer l'upload des fichiers
    public function setLogoAttribute($value)
    {
        $attribute_name = "logo";
        $disk = "public";
        $destination_path = "services";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "services";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    // Accesseurs pour les URLs
public function getLogoUrlAttribute()
{
    if ($this->logo) {
        return asset('storage/' . $this->logo); // Au lieu de 'storage/services/'
    }
    return null;
}

public function getImageUrlAttribute()
{
    if ($this->image) {
        return asset('storage/' . $this->image); // Au lieu de 'storage/services/'
    }
    return null;
}}