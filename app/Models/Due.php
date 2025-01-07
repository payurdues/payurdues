<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Due extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function association()
    {
        return $this->belongsTo(Association::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'due_id');
    }
    public function foprospectuspayment()
    {
        return $this->hasMany(Foprospectuspayment::class, 'due_id');
    }

    // public function student()
    // {
    //     return $this->belongsTo(Student::class);
    // }
}
