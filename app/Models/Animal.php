<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Animal extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    /**
     * Récupère tous les rapports vétérinaires de cet animal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rapports(): HasMany
    {
        return $this->hasMany(RapportVeterinaire::class);
    }

    /**
     * Récupère toutes les alimentations de cet animal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alimentations(): HasMany
    {
        return $this->hasMany(Alimentation::class);
    }

    /**
     * Récupère la race de cet animal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }

    /**
     * Récupère l'habitat de cet animal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function habitat(): BelongsTo
    {
        return $this->belongsTo(Habitat::class);
    }
}
