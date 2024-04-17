<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RapportVeterinaire extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $connection = "mysql";


    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'detail',
        'nourriture',
        'etat',
        'quantite',
        'animal_id',
        'user_id'
    ];

    /**
     * Récupère l'animal associé à ce rapport vétérinaire.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }

    /**
     * Récupère l'utilisateur associé à ce rapport vétérinaire.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
