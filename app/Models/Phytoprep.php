<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Phytoprep extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function produits()
    {
        return $this->belongsToMany(Phytoproduit::class)->withPivot('quantite');
    }

    public function formations() : BelongsToMany {
        return $this->belongsToMany(Formation::class);
    }
}
