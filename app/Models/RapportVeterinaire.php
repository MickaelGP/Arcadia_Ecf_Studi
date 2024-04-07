<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RapportVeterinaire extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'date',
        'detail',
        'nourriture',
        'etat',
        'quantite',
        'animal_id',
        'user_id'
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
