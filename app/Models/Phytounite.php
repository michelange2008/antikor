<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phytounite extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function phytoproduits()
    {
        return $this->hasMany(Phytoproduit::class);
    }
}
