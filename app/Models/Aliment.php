<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aliment extends Model
{
    use HasFactory;

    public $timestamps= false;
    protected $guarded = [];

    function altype() : BelongsTo {
        return $this->belongsTo(Altype::class);
    }

    function alstade() : BelongsTo {
        return $this->belongsTo(Alstade::class);
    }
}
