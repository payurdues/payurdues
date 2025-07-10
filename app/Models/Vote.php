<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['student_id', 'election_id', 'category_id', 'candidate_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function election() {
        return $this->belongsTo(Election::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function candidate() {
        return $this->belongsTo(Candidate::class);
    }
}
