<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    public function rapports()
    {
        return $this->hasMany(RapportVeterinaire::class);
    }
    public function alimentations()
    {
        return $this->hasMany(Alimentation::class);
    }
    public function race()
    {
        return $this->belongsTo(Race::class);
    }
}
