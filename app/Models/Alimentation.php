<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimentation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'animal_id ',
        'date_alimentation',
        'heure_alimentation',
        'nourriture',
        'quantite',
    ];
    public $timestamps = false;

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
