<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function habitats(){
        return $this->belongsToMany(Habitat::class);
    }
    public function showImage()
    {
        return '/storage/'. $this->image_data;
    }
}
