<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phytotype extends Model
{
    use HasFactory;

    public function phytoproduits()
    {
        return $this->hasMany(Phytoproduit::class);
    }
}
