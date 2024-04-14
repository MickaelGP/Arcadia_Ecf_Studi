<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Image extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    /**
     * Définit la relation "appartient à plusieurs" avec le modèle Habitat.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function habitats(): BelongsToMany
    {
        return $this->belongsToMany(Habitat::class);
    }
    /**
     * Renvoie l'URL de l'image.
     *
     * @return string
     */
    public function showImage(): string
    {
        return '/storage/' . $this->image_data;
    }
}
