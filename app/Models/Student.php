<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable implements AuthenticatableContract
{

    use HasFactory;

    protected $guarded = [];

    // public function association()
    // {
    //     return $this->belongsTo(Association::class);
    // }

    // public function dues()
    // {
    //     return $this->hasMany(Due::class);
    // }

    // public function dues()
    // {
    //     return $this->hasMany(Due::class, 'payable_faculties', 'faculty');
    // }

    public function getDues()
    {
        return Due::whereJsonContains('payable_faculties', $this->faculty)->get();
    }

     protected $fillable = [
        'matric_no',
        'jamb_reg',
        'form_no',
        'first_name',
        'other_names',
        'faculty',
        'department',
        'level',
        'association_id'
    ];
}
