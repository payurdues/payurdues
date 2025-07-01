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


    protected $fillable = [
        'name',
        'email',
        'password',
        'link',
        'about',
        'contact_person_name',
        'contact_person_phone',
        'bank_code',
        'bank_name',
        'bank_account_no',
        'bank_account_name',
        'provider',
        'image',
        'approval_doc'
    ];


    public function elections()
    {
        return $this->hasMany(Election::class);
    }
    //protected $guarded = [];
}
