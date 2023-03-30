<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phytoproduit extends Model
{
    use HasFactory;

    public function phytotype()
    {
        return $this->belongsTo(Phytotype::class);
    }

    public function phytounite()
    {
        return $this->belongsTo(Phytounite::class);
    }
}
