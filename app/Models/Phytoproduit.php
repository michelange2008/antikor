<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phytoproduit extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function phytotype()
    {
        return $this->belongsTo(Phytotype::class);
    }

    public function phytounite()
    {
        return $this->belongsTo(Phytounite::class);
    }

    public function preparations()
    {
        return $this->belongsToMany(Phytoprep::class)->withPivot('quantite');
    }
}
