<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\University;
use App\Models\Indicator;

class Submission extends Model
{
    protected $fillable = ['university_id', 'indicator_id', 'value', 'score', 'year', 'status'];

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function indicator(): BelongsTo
    {
        return $this->belongsTo(Indicator::class);
    }
}