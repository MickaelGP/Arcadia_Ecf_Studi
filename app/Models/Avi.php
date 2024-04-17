<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avi extends Model
{
    use HasFactory;
    protected $connection = "mysql";


    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pseudo',
        'commentaire',
        'isValide'
    ];
    public $timestamps = false;
}
