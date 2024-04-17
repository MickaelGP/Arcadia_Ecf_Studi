<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vue extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'vue';
    protected  $fillable = ['nom','nombreDeVue'];
}
