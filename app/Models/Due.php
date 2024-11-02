<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Due extends Model
{
    use HasFactory;

    public function association()
    {
        return $this->belongsTo(Association::class);
    }

    // public function student()
    // {
    //     return $this->belongsTo(Student::class);
    // }
}
