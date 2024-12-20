<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Objectifpedago extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nom'];

    function formation() : BelongsTo {
        return $this->belongsTo(Formation::class);
    }
}
