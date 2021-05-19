<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Array necessario para compor os campos desta tabela para insercao no banco de dados
    protected $fillable = [
        'description',
        'price'
    ];
}
