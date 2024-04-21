<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alimentation extends Model
{
    use HasFactory;
    protected $connection = "mysql";

    protected $fillable = [
        'user_id',
        'animal_id',
        'date_alimentation',
        'heure_alimentation',
        'nourriture',
        'quantite',
    ];
    public $timestamps = false;

    /**
     * Récupère l'animal associé à cette alimentation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }

    /**
     * Récupère l'utilisateur associé à cette alimentation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
