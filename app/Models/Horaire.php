<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable =[
        'ouverture_matin',
        'ouverture_soir',
        'fermeture_matin',
        'fermeture_soir'
    ];

}
