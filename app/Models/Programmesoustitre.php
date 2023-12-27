<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Programmesoustitre extends Model
{
    use HasFactory;

    function formation() : BelongsTo {
        return $this->belongsTo(Formation::class);
    }

    function programmedetails() : HasMany {
        return $this->hasMany(Programmedetail::class);
    }
}
