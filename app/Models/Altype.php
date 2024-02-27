<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Altype extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $guarded = [];

    function aliments() : HasMany {
        return $this->hasMany(Aliment::class);
    }
}
