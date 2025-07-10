<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function isVotingOpen()
    {
        $start = Carbon::parse($this->voting_date . ' ' . $this->voting_time);
        $end = $start->copy()->addHours($this->voting_period);

        return now()->between($start, $end);
    }


}
