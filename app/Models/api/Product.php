<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Variável necessaria para informar os campos que podem sofrer alteração
    protected $fillable = [
        'description',
        'price'
    ];
}
