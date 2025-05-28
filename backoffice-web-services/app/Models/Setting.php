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

    // Mutateurs pour gérer l'upload des fichiers
    public function setLogoBlancAttribute($value)
    {
        $attribute_name = "logo_blanc";
        $disk = "public";
        $destination_path = "settings";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function setLogoNoirAttribute($value)
    {
        $attribute_name = "logo_noir";
        $disk = "public";
        $destination_path = "settings";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    // Accesseurs pour les URLs
public function getLogoBlancUrlAttribute()
{
    if ($this->logo_blanc) {
        return asset('storage/' . $this->logo_blanc); // Au lieu de 'storage/settings/'
    }
    return null;
}

public function getLogoNoirUrlAttribute()
{
    if ($this->logo_noir) {
        return asset('storage/' . $this->logo_noir); // Au lieu de 'storage/settings/'
    }
    return null;
}
}