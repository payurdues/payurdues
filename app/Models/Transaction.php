<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function due()
    {
        return $this->belongsTo(Due::class, 'due_id');
    }

    // Define the relationship with the Association model
    public function association()
    {
        return $this->belongsTo(Association::class, 'association_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public static function getTransactions($association_id, $amountType = null)
    {
        $query = self::with(['student', 'due'])->where('association_id', $association_id);
        
        if ($amountType) {
            $query->where('amount_type', $amountType);
        }
        
        return $query->get();
    }
}
