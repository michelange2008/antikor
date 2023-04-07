<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phytoprep extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function produits()
    {
        return $this->belongsToMany(Phytoproduit::class)->withPivot('quantite');
    }
}
