<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Programmedetail extends Model
{
    use HasFactory;

    function programmesoustitre() : BelongsTo {
        return $this->belongsTo(Programmesoustitre::class);
    }
}
