<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stagiaire extends Model
{
    use HasFactory;

    function formations() : HasMany {
        return $this->hasMany(Formation::class);
    }
}
