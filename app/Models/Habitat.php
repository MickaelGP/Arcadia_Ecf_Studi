<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitat extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nom',
        'description',
        'commentaire'
    ];
    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
}
