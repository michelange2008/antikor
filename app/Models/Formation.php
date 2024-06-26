<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Formation extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    public $timestamps = false;

    public function especes(): BelongsToMany
    {
        return $this->belongsToMany(Espece::class);
    }

    function duree() : BelongsTo {
        return $this->belongsTo(Duree::class);
    }

    function stagiaire() : BelongsTo {
            return $this->belongsTo(Stagiaire::class);
    }

    function intervenant() : BelongsTo {
        return $this->belongsTo(Intervenant::class);
    }

    function modalites() : BelongsToMany {
        return $this->belongsToMany(Modalite::class);
    }

    function pedagogies() : BelongsToMany {
        return $this->belongsToMany(Pedagogie::class);
    }

    function documents() : BelongsToMany {
        return $this->belongsToMany(Document::class);
    }

    function objectifpedagos() : HasMany {
        return $this->hasMany(Objectifpedago::class);
    }

    function programmesoustitres() : HasMany {
        return $this->hasMany(Programmesoustitre::class);
    }

    function preparations() : BelongsToMany {
        return $this->belongsToMany(Phytoprep::class);
    }

}
