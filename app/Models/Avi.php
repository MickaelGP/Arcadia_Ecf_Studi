<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avi extends Model
{
    use HasFactory;

    protected $fillable = [
        'pseudo',
        'commentaire',
        'isValide'
    ];
    public $timestamps = false;
}
