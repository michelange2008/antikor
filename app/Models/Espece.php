<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Espece extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    public $timestamps = false;

    public function formations(): BelongsToMany
    {
        return $this->belongsToMany(Formation::class);
    }
}
