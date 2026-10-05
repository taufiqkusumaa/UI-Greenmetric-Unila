<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Submission;

class University extends Model
{
    protected $fillable = ['name', 'country', 'email', 'score', 'rank'];

    public function submissions(): HasMany
    {
        return $this->hasMany(Submission::class);
    }
}