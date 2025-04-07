<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Association extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;
    public function dues()
    {
        return $this->hasMany(Due::class);
    }


    protected $guarded = [];
}
