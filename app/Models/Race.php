<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Race extends Model
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
        'label'
    ];

    /**
     * Récupère tous les animaux de cette race.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }
}
