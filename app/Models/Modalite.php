<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Modalite extends Model
{
    use HasFactory;

    function formations() : BelongsToMany {
        return $this->belongsToMany(Formation::class);
    }
}
