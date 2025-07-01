<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function association()
    {
        return $this->belongsTo(Association::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

}
