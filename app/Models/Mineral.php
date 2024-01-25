<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mineral extends Model
{
    use HasFactory;

    protected $fillable = [
        'zinc',
        'cuivre',
        'iode',
        'selenium',
        'cobalt',
        'manganese',
        'vitA',
        'vitD3',
        'vitE',
    ];
}
