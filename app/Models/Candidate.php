<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    use HasFactory;
    public function election()
    {
        return $this->belongsTo(Election::class);
    }
    public function votes(): HasMany
    {
        return $this->hasMany(\App\Models\Vote::class);
    }

}
